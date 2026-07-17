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

/**
 * Construit le corps HTML de l'email de notification reçu par le propriétaire
 * du site. $name/$email/$message doivent déjà être validés mais pas encore
 * échappés : l'échappement HTML est fait ici, au seul endroit où ça compte.
 */
function contact_render_email_html(string $name, string $email, string $message): string
{
    $safeName    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
    $date        = date('d/m/Y à H:i');

    return <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouveau message</title>
</head>
<body style="margin:0;padding:0;background-color:#E5E2D6;font-family:'Helvetica Neue',Arial,sans-serif;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#E5E2D6;padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background-color:#FBFAF6;border-radius:12px;overflow:hidden;border:1px solid #CFCABC;">
          <tr>
            <td style="background-color:#231F20;padding:28px 32px;">
              <table role="presentation" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="width:9px;height:9px;background-color:#F0451E;border-radius:50%;"></td>
                  <td style="padding-left:10px;color:#F0EDE4;font-size:13px;letter-spacing:.08em;text-transform:uppercase;font-weight:600;">Formulaire de contact</td>
                </tr>
              </table>
              <div style="color:#F0EDE4;font-size:22px;font-weight:700;margin-top:14px;">Nouveau message reçu</div>
              <div style="color:#AEA99C;font-size:13px;margin-top:6px;">{$date}</div>
            </td>
          </tr>
          <tr>
            <td style="padding:28px 32px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                <tr>
                  <td style="padding:10px 0;border-bottom:1px solid #E9E5DB;width:90px;color:#F0451E;font-size:12px;letter-spacing:.06em;text-transform:uppercase;font-weight:600;vertical-align:top;">Nom</td>
                  <td style="padding:10px 0;border-bottom:1px solid #E9E5DB;color:#231F20;font-size:15px;">{$safeName}</td>
                </tr>
                <tr>
                  <td style="padding:10px 0;border-bottom:1px solid #E9E5DB;color:#F0451E;font-size:12px;letter-spacing:.06em;text-transform:uppercase;font-weight:600;vertical-align:top;">Email</td>
                  <td style="padding:10px 0;border-bottom:1px solid #E9E5DB;color:#231F20;font-size:15px;"><a href="mailto:{$safeEmail}" style="color:#231F20;text-decoration:underline;">{$safeEmail}</a></td>
                </tr>
              </table>
              <div style="color:#F0451E;font-size:12px;letter-spacing:.06em;text-transform:uppercase;font-weight:600;margin-bottom:10px;">Message</div>
              <div style="color:#231F20;font-size:15px;line-height:1.6;background-color:#E9E5DB;border-radius:8px;padding:16px 18px;">{$safeMessage}</div>
              <div style="margin-top:28px;text-align:center;">
                <a href="mailto:{$safeEmail}" style="display:inline-block;background-color:#F0451E;color:#FFFFFF;text-decoration:none;font-size:13px;font-weight:600;letter-spacing:.03em;padding:12px 26px;border-radius:6px;">Répondre à {$safeName}</a>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding:18px 32px;background-color:#E9E5DB;color:#6E6A5F;font-size:12px;text-align:center;">
              Envoyé automatiquement depuis le formulaire de contact de theo-birost.fr
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;
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
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body    = contact_render_email_html($name, $email, $message);
        $mail->AltBody = "Nouveau message depuis le formulaire de contact.\n\n"
            . "Nom : $name\n"
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