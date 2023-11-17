<?php
// Include your database connection script here
// include_once("../db/db_connect.php");

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
//     $commentId = $_POST['commentId'];

//     // Delete comment from the database
//     $deleteComment = "DELETE FROM comments WHERE id = ?";
    
//     $stmt = $conn->prepare($deleteComment);
//     $stmt->bind_param('i', $commentId);

//     if ($stmt->execute()) {
//         echo json_encode(['success' => true]);
//     } else {
//         echo json_encode(['success' => false, 'error' => 'Failed to delete comment']);
//     }

//     // Close the prepared statement
//     $stmt->close();
// } else {
//     echo json_encode(['success' => false, 'error' => 'Invalid request']);
// }


session_start();

// Include your database connection script here
include_once("../db/db_connect.php");

// Check if the user is authenticated and is an admin
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Check if the user is authenticated and is an admin
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        $commentId = $_POST['commentId'];

        // Delete comment from the database
        $deleteComment = "DELETE FROM comments WHERE id = ?";

        $stmt = $conn->prepare($deleteComment);
        $stmt->bind_param('i', $commentId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to delete comment']);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Insufficient permissions']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}

?>
