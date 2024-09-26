<?php
session_start();

$response['auth'] = false;
$response['posts'] = null;

if (isset($_SESSION['uid'])) {
   $response['auth'] = true;

   include('../model/dbEgyTalk.php');
   $db = new dbEgyTalk();

   $response['posts'] = $db->getAllPosts();
}
// Behövs för session-cookies och anger att formatet är json
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

// Gör om arrayen till en array med json-objekt
echo json_encode($response, JSON_UNESCAPED_UNICODE);
