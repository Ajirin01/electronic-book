<?php
require_once('../db/db_connect.php');

// Function to sanitize and validate input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Check if the request contains the necessary parameters
if (isset($_GET['content_id']) && isset($_GET['page']) && isset($_GET['limit'])) {
    $contentId = sanitizeInput($_GET['content_id']);
    $page = sanitizeInput($_GET['page']);
    $limit = sanitizeInput($_GET['limit']);

    // Calculate the offset
    $offset = ($page - 1) * $limit;

    // Query to fetch comments with pagination
    // $query = "SELECT * FROM comments WHERE content_id = ? ORDER BY created_at DESC LIMIT ?, ?";
    // $stmt = $conn->prepare($query);

    $query = "SELECT comments.*, users.username
            FROM comments
            JOIN users ON comments.user_id = users.id
            WHERE comments.content_id = ?
            ORDER BY comments.created_at DESC
            LIMIT ?, ?;
            ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $contentId, $offset, $limit);
    

    if ($stmt !== false) {
        $stmt->bind_param('iii', $contentId, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = $result->fetch_all(MYSQLI_ASSOC);

        // Close the prepared statement
        $stmt->close();

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode(array('success' => true, 'comments' => $comments));
    } else {
        // If preparing statement fails
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'error' => 'Failed to prepare statement'));
    }
} else {
    // If required parameters are missing
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'error' => 'Missing parameters'));
}

// Close the database connection
$conn->close();
?>
