<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireLogin() {
    if (empty($_SESSION['user_id'])) {
        error_log("Unauthorized access attempt to a protected page.");
        $_SESSION['message'] = 'You need to log in to access this page.';
        header('Location: /index.php?page=login'); // Абсолютний шлях
        exit;
    }
}

$routes = [
    'home' => 'views/home.php',
    'login' => 'views/login.php',
    'logout' => 'controllers/logoutController.php',
    'about' => 'views/about.php',
    'contact' => 'views/contact.php',
    'register' => 'views/register.php',
    'registercontroller' => 'controllers/registerController.php',
    'logincontroller' =>  'controllers/loginController.php',
    'dashboard' => 'controllers/dashboardController.php',
    'myroutes' => 'views/my-routes.php',
    'profile' => 'views/profile.php',
    'profilecontroller' =>  'controllers/profileController.php',
];

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = strtolower($page);

error_log("Requested page: " . $page);

if (!array_key_exists($page, $routes)) {
    echo $page;
    error_log("Page not found: " . $page);
    header('HTTP/1.0 404 Not Found');
    require './views/404.php';
    exit;
}

$protectedRoutes = ['dashboard', 'profile'];
if (in_array($page, $protectedRoutes)) {
    requireLogin();
}

require_once $routes[$page];

if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
