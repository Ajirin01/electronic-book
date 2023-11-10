<?php
// Include your database connection script here

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_content'])) {
    $contentId = $_POST['content_id'];

    // Delete content from the database
    $deleteContent = "DELETE FROM contents WHERE id = :contentId";
    $stmt = $conn->prepare($deleteContent);
    $stmt->bindParam(':contentId', $contentId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to delete content']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
