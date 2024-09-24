<?php
include_once('../inc/world_connect.php');

$stmt = $db->prepare("SELECT Name, Population, Code FROM country");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_encode($result, JSON_UNESCAPED_UNICODE);
