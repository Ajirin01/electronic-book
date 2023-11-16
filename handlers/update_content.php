<?php
header('Content-Type: application/json');

// Include your database connection script here
include_once("../db/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_content'])) {
    $contentId = $_POST['content_id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    // Check if a file is uploaded
    if (isset($_FILES['content_file']) && $_FILES['content_file']['error'] === 0) {
        // Handle the file upload
        $fileTmpName = $_FILES['content_file']['tmp_name'];
        $fileName = basename($_FILES['content_file']['name']);
        $uploadDir = '../contents/'; // Set your desired upload directory

        $uploadedFilePath = $uploadDir . $fileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($fileTmpName, $uploadedFilePath)) {
            // Update content in the database with file path
            $updateContent = "UPDATE contents SET title = ?, subtitle = ?, description = ?, content_file = ? WHERE id = ?";
            $stmt = $conn->prepare($updateContent);

            if ($stmt !== false) {
                $stmt->bind_param('ssssi', $title, $subtitle, $description, $fileName, $contentId);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Failed to update content']);
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to prepare statement']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to upload the file']);
        }
    } else {
        // No file uploaded, update content without file path
        $updateContent = "UPDATE contents SET title = ?, subtitle = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($updateContent);

        if ($stmt !== false) {
            $stmt->bind_param('sssi', $title, $subtitle, $description, $contentId);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to update content']);
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to prepare statement']);
        }
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
