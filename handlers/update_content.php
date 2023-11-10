<?php
// Include your database connection script here
include_once("../db/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_content'])) {
    $contentId = $_POST['content_id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    // Update content in the database
    $updateContent = "UPDATE contents SET title = :title, subtitle = :subtitle, description = :description WHERE id = :contentId";
    $stmt = $conn->prepare($updateContent);
    $stmt->bindParam(':contentId', $contentId, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update content']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
