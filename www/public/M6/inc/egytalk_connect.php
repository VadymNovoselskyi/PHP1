<?php
    if (!defined('DB_USER')) {
        define('DB_USER', 'egytalk');
    }
    if (!defined('DB_PASSWORD')) {
        define('DB_PASSWORD', '12345');
    }
    if (!defined('DB_HOST')) {
        define('DB_HOST', 'mariadb'); // Use 'mariadb' for Docker, otherwise '127.0.0.1'
    }
    if (!defined('DB_NAME')) {
        define('DB_NAME', 'egytalk');
    }

    // Check if the PDO connection is already created
    if (!isset($db)) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exception handling
    }
    return $db;
?>