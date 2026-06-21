<?php
// db.php - Database connection setup

$db_host = 'localhost';
$db_name = 'u827121208_sendanywhere';
$db_user = 'u827121208_sendanywhere';
$db_pass = 'Sendanywhere45';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    // If the database connection fails, return a JSON error response for API requests
    $is_api = (strpos($_SERVER['REQUEST_URI'], '/api/') !== false) || (strpos($_SERVER['SCRIPT_NAME'], '/api/') !== false);
    if ($is_api) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'error' => 'Database connection failed. Please check db.php configuration.'
        ]);
        exit;
    }
    die("Database connection failed. Please import schema.sql and check db.php database credentials.");
}
