<?php
if (isset($_POST['login'])) login();
else if (isset($_POST['signup'])) signup();
else if (isset($_POST['logout'])) logout();
else header("Location: ../login.html");

function login()
{
    if (!isset($_POST['username'], $_POST['password'])) header("Location: login.html");

    include('../model/dbEgyTalk.php');
    $db = new dbEgyTalk();

    $username = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW);
    $password = $_POST['password'];

    $result = $db->login($username, $password);

    if ($result == [])  {
        header("Location: ../login.html");
        exit;
    }

    $_SESSION = array();
    session_start();

    $_SESSION['uid'] = $result['uid'];
    $_SESSION['username'] = $result['username'];
    $_SESSION['name'] = $result['surname'] . " " . $result['firstname'];
    $_SESSION['password'] = $result['password'];

    $_SESSION['logged_in'] = true;
    header("Location: ../index.php");
}
function signup()
{
    if (!isset($_POST['firstname'], $_POST['surname'], $_POST['username'], $_POST['password'])) {
        //header("Location: ../view/login.html");
        exit();
    }

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    include('../model/dbEgyTalk.php');
    $db = new dbEgyTalk();
    $result = $db->signup($firstname, $surname, $username, $password);

    $_SESSION = array();
    session_start();

    $_SESSION['uid'] = $result['uid'];
    $_SESSION['username'] = $result['username'];
    $_SESSION['name'] = $result['firstaname'] . " " . $result['surname'];
    $_SESSION['password'] = $result['password'];

    $_SESSION['logged_in'] = true;

    header("Location: ../index.php");
}

function logout()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_POST = array();
    $_SESSION = array(); // Tömmer sessionsarrayen    
    session_regenerate_id(true);

    header("Location: ../index.php");
    exit();
}
