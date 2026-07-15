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
        echo "Please complete the form and try again.";
        exit;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USERNAME'];
        $mail->Password   = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = $_ENV['SMTP_PORT'];

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('tbirost@gmail.com', 'Théo Birost'); // Set your receiving email address

        // Content
        $mail->isHTML(false);
        $mail->Subject = "New contact from $name";
        $mail->Body    = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>