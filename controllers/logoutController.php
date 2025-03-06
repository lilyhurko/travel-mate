<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__DIR__) . '/config/db.php';

try {
    $pdo = getPDO();

    $sessionId = session_id();
    $stmt = $pdo->prepare("DELETE FROM logged_in_users WHERE sessionId = ?");
    $stmt->execute([$sessionId]);
} catch (PDOException $e) {
    error_log("Database error during logout: " . $e->getMessage());
}

session_destroy();

header('Location: ?page=login');
exit();
?>
