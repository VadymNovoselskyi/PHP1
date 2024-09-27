<?php
session_start();

$uid = $_GET['uid'];

$response['auth'] = false;
$response['userdata'] = null;

if (isset($_SESSION['uid'])) {
   $response['auth'] = true;

   include('../model/dbEgyTalk.php');
   $db = new dbEgyTalk();

   $response['userdata'] = $db->getUserByUID($uid);
}
// Behövs för session-cookies och anger att formatet är json
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

echo json_encode($response, JSON_UNESCAPED_UNICODE);
