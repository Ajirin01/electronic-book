<?php
// Include your database connection script here
include_once(__DIR__ . "/../db/db_connect.php");


// include_once($_SERVER['DOCUMENT_ROOT'] ."/". $_SERVER['HTTP_HOST']. "/db/db_connect.php");


// Function to get a specific content by ID
function getContentById($contentId) {
    global $conn; // Your database connection variable

    $sql = "SELECT * FROM contents WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $contentId);
    $stmt->execute();

    $result = $stmt->get_result();
    $content = $result->fetch_assoc();

    return $content;
}

// Usage example
// $contentId = 1; // Replace with the actual content ID
// $content = getContentById($contentId);

// echo json_encode($content); // You can modify the output format as needed
?>
