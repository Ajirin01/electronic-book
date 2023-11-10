<?php
session_start();

// Include your database connection script here
include_once("../db/db_connect.php");

$response = array(); // Initialize response array

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validate and sanitize form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $subtitle = filter_var($_POST['subtitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Check if the file was uploaded without errors
    if (isset($_FILES['content_file']) && $_FILES['content_file']['error'] === 0) {
        // Handle the file upload
        $fileTmpName = $_FILES['content_file']['tmp_name'];
        $fileName = basename($_FILES['content_file']['name']);
        $uploadDir = '../contents/'; // Set your desired upload directory

        $uploadedFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpName, $uploadedFilePath)) {
            // File upload successful, continue with database insertion

            // Insert content into the database
            $insertContent = "INSERT INTO contents (title, subtitle, description, content_file) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertContent);
            $stmt->bind_param('ssss', $title, $subtitle, $description, $fileName);

            if ($stmt->execute()) {
                // Content insertion successful
                $response['success'] = true;
                $response['message'] = "Content added successfully!";
            } else {
                // Content insertion failed
                $response['success'] = false;
                $response['error'] = "Failed to add content. Please try again.";
            }
        } else {
            // File upload failed
            $response['success'] = false;
            $response['error'] = "Failed to upload the file. Please try again.";
        }
    } else {
        // File not uploaded or an error occurred during upload
        $response['success'] = false;
        $response['error'] = "File upload error. Please choose a file and try again.";
    }
} else {
    // Invalid request method or form not submitted
    $response['success'] = false;
    $response['error'] = "Invalid request method or form not submitted.";
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
