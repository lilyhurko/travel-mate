<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    $_SESSION['message'] = 'You must be logged in to access this page.';
    header('Location: /index.php?page=login');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = trim($_POST['password'] ?? '');

    // Перевірка наявності даних
    if (empty($name) || empty($email)) {
        $_SESSION['message'] = 'Name and Email are required.';
        header('Location: /index.php?page=profile');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = 'Invalid email format.';
        header('Location: /index.php?page=profile');
        exit();
    }

    $pdo = getPDO();
    if ($pdo) {
        try {
            $pdo->beginTransaction();

            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
                $stmt->execute([$name, $email, $hashed_password, $user_id]);
            } else {
                $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
                $stmt->execute([$name, $email, $user_id]);
            }

            $pdo->commit();

            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['message'] = 'Profile updated successfully.';
        } catch (PDOException $e) {
            $pdo->rollBack();
            error_log("Error updating profile for user ID {$user_id}: " . $e->getMessage());
            $_SESSION['message'] = 'An error occurred. Please try again later.';
        }
    } else {
        $_SESSION['message'] = 'Database connection failed.';
    }

    header('Location: /index.php?page=profile');
    exit();
}

?>
