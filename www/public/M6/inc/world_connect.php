<?php
    // Definierar konstanter med användarinformation.
    define ('DB_USER', 'world');
    define ('DB_PASSWORD', '12345');
    define ('DB_HOST', 'localhost'); // 'Om docker - 'mariadb', annars 127.0.0.1
    define ('DB_NAME', 'world');
    
    // Skapar en anslutning till MySql och databasen world
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
?>