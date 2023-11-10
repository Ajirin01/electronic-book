<?php
session_start();
require '../vendor/autoload.php';
require('../db/db_connect.php');

$options = array(
    'cluster' => 'mt1',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    'a683c1828547b5af7c07',
    '1d29b7a5d35fa8947bd4',
    '1703624',
    $options
);


// Function to sanitize and validate input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $commentText = sanitizeInput($_POST['commentText']);
    $contentId = sanitizeInput($_POST['contentId']);
    $user_id = $_SESSION['user']['id'];

    // echo json_encode($_POST);

    // Check if the database connection is established
    if ($conn !== null) {
        // Insert comment into the database using prepared statement
        $query = "INSERT INTO comments (user_id, content_id, comment_text) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt !== false) {
            $stmt->bind_param('iis', $user_id, $contentId, $commentText);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch the updated comments after insertion
                $comments = getCommentsForContent($contentId);

                $response = array('success' => true, 'comments' => $comments);
                $data['comment'] = $comments;
                $pusher->trigger('comment-channel'.$contentId, 'comment-submited'.$contentId, $data);
            } else {
                $response = array('success' => false, 'error' => 'Failed to insert comment');
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            $response = array('success' => false, 'error' => 'Failed to prepare statement');
        }
    } else {
        $response = array('success' => false, 'error' => 'Database connection is null');
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If not a POST request, return an error
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'error' => 'Invalid request method'));
}

// Function to get comments for a specific content ID
function getCommentsForContent($contentId) {
    // Assume $conn is the database connection
    require("../db/db_connect.php");
    $query = "SELECT comments.*, users.username
            FROM comments
            JOIN users ON comments.user_id = users.id
            WHERE comments.content_id = ?
            ORDER BY comments.created_at DESC
            LIMIT 1;
            ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $contentId);
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = $result->fetch_all(MYSQLI_ASSOC);

    // Close the prepared statement
    $stmt->close();

    return $comments[0];
}
?>
