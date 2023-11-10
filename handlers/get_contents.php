<?php
// Include your database connection script here
include_once("../db/db_connect.php");

// Function to get all contents
function getContents() {
    global $conn; // Your database connection variable

    $sql = "SELECT * FROM contents ORDER BY created_at DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Usage example
$contents = getContents();

echo json_encode($contents); // You can modify the output format as needed
?>
