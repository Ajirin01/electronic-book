<?php
session_start();
require '../vendor/autoload.php';
require('../db/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    // Validate and sanitize the content ID
    $contentId = filter_var($_POST['contentId'], FILTER_SANITIZE_NUMBER_INT);

    // Check if the user has the permission to edit (you can customize this based on your authentication logic)
    if ($_SESSION['user']['role'] !== 'admin') {
        echo json_encode(['success' => false, 'error' => 'Permission denied']);
        exit;
    }

    // Retrieve the content from the database based on ID
    $getContentQuery = "SELECT * FROM contents WHERE id = ?";
    $stmt = $conn->prepare($getContentQuery);
    $stmt->bind_param('i', $contentId);
    $stmt->execute();
    $result = $stmt->get_result();
    $content = $result->fetch_assoc();

    // Close the prepared statement
    $stmt->close();

    // Check if content is found
    if ($content) {
        // Return the content details as JSON
        echo json_encode(['success' => true, 'content' => $content]);
    } else {
        // Content not found
        echo json_encode(['success' => false, 'error' => 'Content not found']);
    }
} else {
    // Invalid request method or form not submitted
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
