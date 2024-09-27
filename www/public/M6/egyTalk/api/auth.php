<?php
session_start();

include('../model/dbEgyTalk.php');
$db = new dbEgyTalk();

$response['auth'] = false;
$response['userdata'] = null;

// Om redan inlogggad skicka data
//if (isset($_SESSION['uid'])) {
    //$user = $db->getUserFromUid($_SESSION['uid']);
//} 
if (isset($_POST['username'], $_POST['password'])) {
    $user = $db->auth($_POST['username'], $_POST['password'], false);
}

if (isset($user) && !empty($user)) {
    $response['auth'] = true;
    $response['userdata'] = $user;
    session_regenerate_id();
    $_SESSION['uid'] = $user['uid'];
}

if(!$response['auth']) header('HTTP/1.0 401 Unauthorized');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

echo json_encode($response, JSON_UNESCAPED_UNICODE);
