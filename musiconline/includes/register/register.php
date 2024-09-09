<?php
include '../../config/dbConfig.php';
session_start();

// Input sanitization
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validate username (alphanumeric)
if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
    $_SESSION['status_message'] = 'Username is not valid! Only alphanumeric characters are allowed.';
    header('Location: ../register');
    exit();
}

// Validate password (between 5 and 20 characters)
if (strlen($password) < 5 || strlen($password) > 20) {
    $_SESSION['status_message'] = 'Password must be between 5 and 20 characters long!';
    header('Location: ../register');
    exit();
}

// Validate email (basic validation, can be expanded)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status_message'] = 'Invalid email format!';
    header('Location: ../register');
    exit();
}

// Check if the username already exists in the database
$stmt = $conn->prepare('SELECT id FROM user WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Username already exists
    $_SESSION['status_message'] = 'Username already exists! Please choose another.';
    $stmt->close();
    header('Location: ../register');
    exit();
} else {
    $stmt->close();

    // Username doesn't exist, insert new account
    $stmt = $conn->prepare("INSERT INTO user (username, email, password, is_admin, is_active) VALUES (?, ?, ?, 0, 1)");
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Bind parameters and execute the query
    if ($stmt) {
        $stmt->bind_param('sss', $username, $email, $hashed_password);
        $stmt->execute();

        // If account creation is successful
        if ($stmt->affected_rows > 0) {
            $_SESSION['status_message'] = 'Account successfully created! You can now log in.';
            header('Location: ../../login');
        } else {
            $_SESSION['status_message'] = 'Account creation failed. Please try again later.';
            header('Location: ../register');
        }

        $stmt->close();
    } else {
        $_SESSION['status_message'] = 'Database error. Please try again later.';
        header('Location: ../register');
    }

    $conn->close();
    exit();
}
?>
