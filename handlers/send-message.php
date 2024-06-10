<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Collect form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Your email address where you want to receive messages
    $to = 'mubarakolagoke@gmail.com';

    // Subject of the email
    $subject = 'Principle of Electronics Enquiry';

    // Compose the message
    $emailMessage = "Name: $name\n";
    $emailMessage .= "Phone: $phone\n";
    $emailMessage .= "Email: $email\n\n";
    $emailMessage .= "Message:\n$message";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.electronicsohize.com';            // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '_mainaccount@electronicsohize.com';        // SMTP username
        $mail->Password   = 'Y4N0+YhV+d69kx';                       // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable SSL encryption
        $mail->Port       = 465;                                    // TCP port to connect to for SSL

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($to);                                     // Add a recipient

        // Content
        $mail->isHTML(false);                                       // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body    = $emailMessage;

        $mail->send();
        $_SESSION['message_sent'] = "Message sent successfully!";
    } catch (Exception $e) {
        $_SESSION['message_failed'] = "Failed to send message. Please try again! Error: {$mail->ErrorInfo}";
    }
} else {
    // Invalid request
    $_SESSION['message_failed'] = "Invalid request!";
}

// Debug output
// echo json_encode($_SESSION);
// exit();

header("location: ../index.php");
?>
