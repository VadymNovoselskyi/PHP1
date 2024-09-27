<?php
session_start();

$uid = $_GET['uid'];

$response['auth'] = false;
$response['posts'] = null;

if (isset($_SESSION['uid'])) {
   $response['auth'] = true;

   include('../model/dbEgyTalk.php');
   $db = new dbEgyTalk();

   $response['posts'] = $db->getUserPosts($uid);

   for($i = 0; $i < sizeof($response['posts']); $i++) {
      $comments = $db->getComments($response['posts'][$i]['pid']);
      $response['posts'][$i]['comments'] = $comments; 
   }
}
// Behövs för session-cookies och anger att formatet är json
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

echo json_encode($response, JSON_UNESCAPED_UNICODE);
