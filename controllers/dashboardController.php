<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id'])) {
    $_SESSION['message'] = 'Please log in to access the control panel.';
    header('Location: /index.php?page=login');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

function render($view, $data = []) {
    extract($data);
    require $_SERVER['DOCUMENT_ROOT'] . "/views/{$view}.php";
}

function addOrder($route_id, $user_id, $user_name) {
    $pdo = getPDO();
    $query = "INSERT INTO orders (route_id, user_id, user_name) VALUES (:route_id, :user_id, :user_name)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':route_id', $route_id, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['route_id'])) {
    $route_id = $_POST['route_id'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];

    if (addOrder($route_id, $user_id, $user_name)) {
        $_SESSION['message'] = 'Order successfully added!';
        echo json_encode(['success' => true, 'message' => 'Order placed successfully.']);
    } else {
        $_SESSION['message'] = 'Error adding order.';
        echo json_encode(['success' => false, 'message' => 'Order place failed.']);
    }
    exit();
}

$pdo = getPDO();

$category = $_GET['category'] ?? null;

$query = "SELECT * FROM user_routes WHERE visibility = 'public'";
if ($category) {
    $query .= " AND route_type = :category";
}
$stmt = $pdo->prepare($query);

if ($category) {
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
}
$stmt->execute();

$dashboardRoutes = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($dashboardRoutes as &$route) {
    $route['name'] = $route['name'] ?: 'Unnamed route';
    $route['description'] = $route['description'] ?: 'No description.';
}

render('dashboard', [
    'dashboardRoutes' => $dashboardRoutes,
    'user_id' => $_SESSION['user_id'],
    'user_name' => $_SESSION['user_name'],
    'selectedCategory' => $category // Pass the selected category to the view
]);
?>
