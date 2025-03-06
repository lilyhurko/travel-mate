<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $pdo = getPDO();

    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user_id]);

        session_destroy();
        header('Location: /index.php?page=login');
        exit();
    } catch (PDOException $e) {
        error_log("Error deleting profile: " . $e->getMessage());
        $_SESSION['message'] = 'Failed to delete profile.';
        header('Location: /index.php?page=profile');
        exit();
    }
}
