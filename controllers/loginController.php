<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';
$pdo = getPDO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ?page=login');
        exit();
    }

    try {
        error_log("Login attempt: email = $email");

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            error_log("User found: " . print_r($user, true));

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email']; // Витягується з бази даних після логіну


                session_regenerate_id(true); // Оновлення session_id для безпеки

                $sessionId = session_id();
                $lastUpdate = date('Y-m-d H:i:s');
                $stmt = $pdo->prepare("INSERT INTO logged_in_users (sessionId, userId, lastUpdate) VALUES (?, ?, ?)");
                $stmt->execute([$sessionId, $user['id'], $lastUpdate]);

                header('Location: ?page=dashboard');
                exit();
            } else {
                $_SESSION['error'] = 'Invalid email or password.';
                header('Location: ?page=login');
                exit();
            }
        } else {
            error_log("User not found for email: $email");
            $_SESSION['error'] = 'Invalid email or password.';
            header('Location: ?page=login');
            exit();
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        $_SESSION['error'] = 'Something went wrong. Try again later.';
        header('Location: ?page=login');
        exit();
    }
}
?>
