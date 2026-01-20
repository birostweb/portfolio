<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Encodage et headers
mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=UTF-8');
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Content-Security-Policy: default-src 'self'; script-src 'self'");

// Chargement des variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../'); // remonte d'un dossier
$dotenv->load();


// Limitation des tentatives
$maxAttempts = 1;
$timeFrame = 240; // secondes

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = [];
}

// Nettoyage des anciennes tentatives
$_SESSION['attempts'] = array_filter($_SESSION['attempts'], function ($timestamp) use ($timeFrame) {
    return $timestamp > time() - $timeFrame;
});

if (count($_SESSION['attempts']) >= $maxAttempts) {
    header("Location: index.php?status=error&message=" . urlencode("Trop de tentatives. Réessayez plus tard.") . "#contact");
    exit;
}

$_SESSION['attempts'][] = time();

// Fonction de nettoyage des champs (préserve les accents)
function clean_input($data) {
    $data = trim($data);
    return htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Récupération des données du formulaire
$name = clean_input($_POST["name"] ?? '');
$firstname = clean_input($_POST["firstname"] ?? '');
$email = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
$message = clean_input($_POST["message"] ?? '');

// Validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?status=error&message=" . urlencode("L'email fourni n'est pas valide.") . "#contact");
    exit;
}

if (empty($message) || strlen($message) > 2000) {
    header("Location: index.php?status=error&message=" . urlencode("Le message est vide ou trop long.") . "#contact");
    exit;
}

// Envoi avec PHPMailer
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = $_ENV['SMTP_SECURE'] === 'TLS' ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $_ENV['SMTP_PORT'];

    $mail->setFrom($_ENV['SMTP_USERNAME'], 'Portfolio Contact');
    $mail->addAddress('tbirost@gmail.com');

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true); // texte HTML pour conserver les accents et sauts de ligne

    $mail->Subject = "Nouveau message de $firstname $name";
    $mail->Body = nl2br("Nom : $firstname $name\nEmail : $email\nMessage :\n$message");

    $mail->send();

    header("Location: index.php?status=success#contact");
    exit;

} catch (Exception $e) {
    $errorMessage = urlencode("Erreur lors de l'envoi : " . $mail->ErrorInfo);
    header("Location: index.php?status=error&message=$errorMessage#contact");
    exit;
}
