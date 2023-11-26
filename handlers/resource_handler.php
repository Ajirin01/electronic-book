<?php
session_start();
// Include your database connection script here
include_once("../db/db_connect.php");

// Check if the user is authenticated and is an admin (adjust based on your authentication logic)
if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if it's a resource upload request
        if (isset($_POST['upload_resource'])) {
            // Handle resource upload
            $uploadDir = '../resources/'; // Adjust the directory path as needed

            // Ensure the destination directory exists
            if (!file_exists($uploadDir) && !mkdir($uploadDir, 0777, true)) {
                echo json_encode(['success' => false, 'error' => 'Failed to create the destination directory']);
                exit;
            }

            // Generate a unique filename to avoid overwriting
            $uploadedFile = $uploadDir . basename($_FILES['resource_file']['name']);

            $basename = basename($_FILES['resource_file']['name']);

            // Attempt to move the uploaded file
            $uploadSuccess = move_uploaded_file($_FILES['resource_file']['tmp_name'], $uploadedFile);

            if ($uploadSuccess) {
                // Insert resource details into the database
                $resourceName = $_FILES['resource_file']['name'];
                $resourcePath = $uploadedFile;

                $insertResource = "INSERT INTO resources (name, path) VALUES (?, ?)";
                $stmt = $conn->prepare($insertResource);
                $stmt->bind_param('ss', $_POST['name'], $basename);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Resource uploaded successfully']);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Failed to save resource details to the database', 'db_error' => $stmt->error]);
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file', 'upload_error' => $_FILES['resource_file']['error']]);
            }
        }

        // Check if it's a resource deletion request
        if (isset($_POST['delete_resource'])) {
            $resourceId = $_POST['resource_id'];
            $resourcePath = $_POST['resource_path'];

            // Delete resource from the database
            $deleteResource = "DELETE FROM resources WHERE id = ?";
            $stmt = $conn->prepare($deleteResource);
            $stmt->bind_param('i', $resourceId);

            if ($stmt->execute()) {
                // Delete the file from the server
                if (unlink($resourcePath)) {
                    echo json_encode(['success' => true, 'message' => 'Resource deleted successfully']);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Failed to delete resource file']);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to delete resource from the database']);
            }

            // Close the prepared statement
            $stmt->close();
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid request']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Insufficient permissions']);
}
?>
