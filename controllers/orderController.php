<?php
require_once dirname(__DIR__) . '/config/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 22; // Replace 22 with a default or session user ID

$pdo = getPDO();

if (!$pdo) {
    die('Database connection failed.');
}

$sql = "
    SELECT orders.*, user_routes.name AS route_name 
    FROM orders 
    LEFT JOIN user_routes ON orders.route_id = user_routes.id 
    WHERE orders.user_id = :user_id
";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);

$orders = $stmt->fetchAll();

return $orders;
?>
