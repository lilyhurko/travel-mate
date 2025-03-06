<?php
// Старт сесії
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    error_log("Session started.");
} else {
    error_log("Session already active.");
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';
error_log("Database connection script included.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("Processing registration form submission.");

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    error_log("Received form data: Name={$name}, Email={$email}.");

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ?page=register');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format.';
        error_log("Form validation failed: Invalid email format for {$email}.");
        header('Location: ?page=register');
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'Passwords do not match.';
        error_log("Form validation failed: passwords do not match.");
        header('Location: ?page=register');
        exit();
    }

    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
        $_SESSION['error'] = 'Password must be at least 8 characters long and contain at least one uppercase letter.';
        error_log("Form validation failed: Password does not meet complexity requirements.");
        header('Location: ?page=register');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    error_log("Password hashed successfully.");

    try {
        $pdo = getPDO();
        error_log("Database connection established.");

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $_SESSION['error'] = 'User with this email already exists.';
            header('Location: ?page=register');
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $hashedPassword]);

        $_SESSION['success'] = 'Account successfully created. You can now log in.';
        header('Location: ?page=login');
        exit();

    } catch (PDOException $e) {
        error_log("Database error during registration: " . $e->getMessage());
        $_SESSION['error'] = 'Something went wrong. Please try again later.';
        header('Location: ?page=register');
        exit();
    }
} else {
    error_log("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    header('Location: ?page=register');
    exit();
}
