<?php
include_once('../inc/world_connect.php');   
$country = $_GET['country']; // Läser in parameter

$stmt = $db->prepare("SELECT Name, Population, Code FROM country WHERE name LIKE :country");
$stmt->bindValue(":country", "$country%");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_encode($result, JSON_UNESCAPED_UNICODE);
