<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// En production (Dokploy), les variables sont injectées dans l'environnement.
// En local, on les charge depuis le .env s'il existe.
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    // Pas de .env : normal en prod.
}

/**
 * Renvoie l'IP du visiteur. Derrière un proxy (Dokploy/Traefik), on prend
 * la première IP de X-Forwarded-For ; sinon on retombe sur REMOTE_ADDR.
 */
function contact_client_ip(): string
{
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $parts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($parts[0]);
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return $ip;
        }
    }
    return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
}

/**
 * Rate limit fichier par IP : true si la limite est dépassée.
 * Pas de base de données sur ce projet, donc stockage sur le filesystem
 * du conteneur (réinitialisé à chaque redéploiement, ce qui reste acceptable
 * pour ce cas d'usage).
 */
function contact_rate_limited(string $ip, int $maxRequests = 5, int $windowSeconds = 3600): bool
{
    $dir = sys_get_temp_dir() . '/contact_form_rl';
    if (!is_dir($dir)) {
        mkdir($dir, 0700, true);
    }

    $file = $dir . '/' . hash('sha256', $ip) . '.json';
    $handle = fopen($file, 'c+');
    if (!$handle) {
        return false; // On ne bloque pas l'envoi si le filesystem n'est pas disponible.
    }

    flock($handle, LOCK_EX);
    $raw = stream_get_contents($handle);
    $timestamps = json_decode($raw ?: '[]', true);
    if (!is_array($timestamps)) {
        $timestamps = [];
    }

    $now = time();
    $timestamps = array_values(array_filter($timestamps, function ($t) use ($now, $windowSeconds) {
        return $t > $now - $windowSeconds;
    }));

    $limited = count($timestamps) >= $maxRequests;
    if (!$limited) {
        $timestamps[] = $now;
        ftruncate($handle, 0);
        rewind($handle);
        fwrite($handle, json_encode($timestamps));
        fflush($handle);
    }

    flock($handle, LOCK_UN);
    fclose($handle);

    return $limited;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- Rate limit par IP : coupe le spam en rafale avant tout autre traitement ---
    if (contact_rate_limited(contact_client_ip())) {
        http_response_code(429);
        echo "Trop de tentatives. Merci de réessayer plus tard.";
        exit;
    }

    // --- Honeypot : les bots génériques remplissent tous les champs, y compris celui-ci ---
    // On répond comme si tout allait bien pour ne pas leur indiquer qu'ils sont détectés.
    if (!empty($_POST['website'])) {
        http_response_code(200);
        echo "Merci ! Votre message a bien été envoyé.";
        exit;
    }

    // --- Jeton signé HMAC + délai minimum : bloque les POST directs sans passage par la page ---
    $ts    = $_POST['ts'] ?? '';
    $token = $_POST['token'] ?? '';
    $expectedToken = hash_hmac('sha256', (string) $ts, $_ENV['CONTACT_FORM_SECRET'] ?? '');

    if (!ctype_digit((string) $ts) || !hash_equals($expectedToken, (string) $token)) {
        http_response_code(400);
        echo "Requête invalide. Merci de recharger la page et réessayer.";
        exit;
    }

    $elapsed = time() - (int) $ts;
    if ($elapsed > 3600) {
        http_response_code(400);
        echo "Formulaire expiré. Merci de recharger la page et réessayer.";
        exit;
    }
    if ($elapsed < 3) {
        // Envoyé trop vite pour un humain : traité en silence comme le honeypot.
        http_response_code(200);
        echo "Merci ! Votre message a bien été envoyé.";
        exit;
    }

    // --- Validation stricte des champs ---
    $name    = str_replace(["\r", "\n"], '', strip_tags(trim($_POST["name"] ?? '')));
    $email   = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"] ?? '');

    if (
        $name === '' || mb_strlen($name) > 100
        || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254
        || $message === '' || mb_strlen($message) < 10 || mb_strlen($message) > 5000
    ) {
        http_response_code(400);
        echo "Veuillez remplir tous les champs correctement et réessayer.";
        exit;
    }

    // --- Limite de liens : contenu publicitaire / spam ---
    $linkCount = preg_match_all('#https?://|www\.#i', $message);
    if ($linkCount > 2) {
        http_response_code(400);
        echo "Votre message contient trop de liens.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';

        // --- Serveur ---
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USERNAME'];
        $mail->Password   = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = (int) $_ENV['SMTP_PORT'];

        // --- Expéditeur / destinataire ---
        // OVH exige que le From soit identique au compte authentifié.
        // L'adresse du visiteur va en Reply-To : le bouton "Répondre" lui répond.
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Formulaire theo-birost.fr');
        $mail->addAddress('contact@theo-birost.fr', 'Théo Birost');
        $mail->addReplyTo($email, $name);

        // --- Contenu ---
        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body    = "Vous avez reçu un nouveau message depuis votre formulaire de contact.\n\n"
            . "Voici les détails :\n\n"
            . "Nom : $name\n\n"
            . "Email : $email\n\n"
            . "Message :\n$message";

        $mail->send();
        http_response_code(200);
        echo "Merci ! Votre message a bien été envoyé.";

    } catch (Exception $e) {
        http_response_code(500);
        echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }

} else {
    http_response_code(403);
    echo "Un problème est survenu lors de l'envoi, veuillez réessayer.";
}