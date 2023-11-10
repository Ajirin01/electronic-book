<?php
// Include your database connection script here
include_once("../db/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_comment'])) {
    $commentId = $_POST['comment_id'];
    $contentId = $_POST['content_id'];
    $commentText = $_POST['comment_text'];

    // Update comment in the database
    $updateComment = "UPDATE comments SET comment_text = :commentText WHERE id = :commentId AND content_id = :contentId";
    $stmt = $conn->prepare($updateComment);
    $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
    $stmt->bindParam(':contentId', $contentId, PDO::PARAM_INT);
    $stmt->bindParam(':commentText', $commentText, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update comment']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
