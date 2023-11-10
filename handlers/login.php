<?php
session_start();
// Include your database connection script here
include_once("../db/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user from the database based on email
    $getUserQuery = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($getUserQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid email or password']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
