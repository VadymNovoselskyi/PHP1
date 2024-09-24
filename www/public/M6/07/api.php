<?php
include_once('../inc/world_connect.php');   
$code = $_GET['code']; // Läser in parameter

$stmt = $db->prepare("SELECT Name, Population FROM city WHERE CountryCode LIKE :code");
$stmt->bindValue(":code", "$code");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_encode($result, JSON_UNESCAPED_UNICODE);
