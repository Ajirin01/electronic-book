<?php
session_start();

// Include your database connection script here
include_once("../db/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $response = array('success' => false, 'error' => 'Confirmation password does not match the password');
        echo json_encode($response);
        exit;
    }

    // Check if the email is unique
    $checkEmail = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response = array('success' => false, 'error' => 'Email already exists');
        echo json_encode($response);
        exit;
    }

    // Check if the username is unique
    $checkUsername = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($checkUsername);
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response = array('success' => false, 'error' => 'Username already exists');
        echo json_encode($response);
        exit;
    }

    // Insert user into the database
    $insertUser = "INSERT INTO users (full_name, username, email, phone, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertUser);
    $stmt->bind_param('sssss', $full_name, $username, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        // You need to fetch the registered user from the database
        // and assign it to $_SESSION['user']
        // header("location: index.php");
        $_SESSION['user'] = getRegisteredUserByEmail($email);
        $response = array('success' => true, 'message' => 'Registration successful!');
        echo json_encode($response);
        exit;
    } else {
        $response = array('success' => false, 'error' => 'Registration failed, please try again!');
        echo json_encode($response);
        exit;
    }
} else {
    $response = array('success' => false, 'error' => 'Invalid request');
    echo json_encode($response);
    exit;
}

// Function to get a registered user by email
function getRegisteredUserByEmail($email) {
    global $conn;

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the user data
    $user = $result->fetch_assoc();

    // Close the prepared statement
    $stmt->close();

    return $user;
}

?>
