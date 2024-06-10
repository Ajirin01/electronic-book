<?php
session_start();
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

    // Additional headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $emailMessage, $headers)) {
    // if (false) {
        // Email sent successfully
        $_SESSION['message_sent'] = "Message sent successfully!";
        // echo json_encode(['success' => true, 'message' => 'Message sent successfully!']);
    } else {
        // Email sending failed
        $_SESSION['message_failed'] = "Failed to send message. Please try again!";
        // echo json_encode(['success' => false, 'message' => 'Failed to send message. Please try again.']);
    }
} else {
    // Invalid request
    $_SESSION['message_failed'] = "Invalid request!";
    // echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}

header("location: ../index.php");
?>
