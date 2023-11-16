<?php
session_start();
require '../vendor/autoload.php';
require('../db/db_connect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Validate and sanitize the content ID
    $contentId = filter_var($_POST['contentId'], FILTER_SANITIZE_NUMBER_INT);

    // Check if the user has the permission to delete (you can customize this based on your authentication logic)
    if ($_SESSION['user']['role'] !== 'admin') {
        echo json_encode(['success' => false, 'error' => 'Permission denied']);
        exit;
    }

    // Delete content from the database
    $deleteContentQuery = "DELETE FROM contents WHERE id = ?";
    $stmt = $conn->prepare($deleteContentQuery);
    $stmt->bind_param('i', $contentId);

    if ($stmt->execute()) {
        // Content deletion successful
        echo json_encode(['success' => true, 'message' => 'Content deleted successfully']);
    } else {
        // Content deletion failed
        echo json_encode(['success' => false, 'error' => 'Failed to delete content']);
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Invalid request method or form not submitted
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
