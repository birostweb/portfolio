<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// In production (like Dokploy), variables are injected directly into the environment.
// For local development, we load them from a .env file if it exists.
try {
    // The path is now __DIR__, which is /var/www/html in the container.
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    // .env file not found, which is expected in production.
    // We assume the environment variables are set by the server.
}

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check that data was sent.
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Veuillez remplir tous les champs et réessayer.";
        exit;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Set character set to UTF-8
        $mail->CharSet = 'UTF-8';

        // Server settings
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USERNAME'];
        $mail->Password   = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = $_ENV['SMTP_PORT'];

        // Recipients
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Formulaire theo-birost.fr');
        $mail->addAddress('contact@theo-birost.fr', 'Théo Birost');
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body    = "Vous avez reçu un nouveau message depuis votre formulaire de contact.\n\n"."Voici les détails :\n\nNom : $name\n\nEmail : $email\n\nMessage :\n$message";

        $mail->send();
        http_response_code(200);
        echo "Merci ! Votre message a bien été envoyé.";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "Un problème est survenu lors de l'envoi, veuillez réessayer.";
}
?>