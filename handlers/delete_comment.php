<?php
// Include your database connection script here
include_once("../db/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_comment'])) {
    $commentId = $_POST['comment_id'];
    $contentId = $_POST['content_id'];

    // Delete comment from the database
    $deleteComment = "DELETE FROM comments WHERE id = :commentId AND content_id = :contentId";
    $stmt = $conn->prepare($deleteComment);
    $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
    $stmt->bindParam(':contentId', $contentId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to delete comment']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
