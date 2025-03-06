<?php
$host = '127.0.0.1:3307';
$db = 'travelmate';
$user = 'root';
$pass = '123456';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Function to get PDO instance
function getPDO() {
    global $dsn, $user, $pass, $options;

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (\PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());

    }
}


$pdo = getPDO(); // Attempt to get PDO instance

// Optionally, check if PDO is set properly
if (!$pdo) {
    error_log("Failed to connect to the database.");
    $_SESSION['error'] = 'Database connection failed.';
    header('Location: /index.php?page=register');
    exit();
}
?>
