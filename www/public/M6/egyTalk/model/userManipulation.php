<?php
if (isset($_POST['login'])) login();
else if (isset($_POST['signup'])) signup();
else if (isset($_POST['logout'])) logout();
else header("Location: login.php");

function login()
{
    if (!isset($_POST['username'], $_POST['password'])) header("Location: login.php");

    include_once('../inc/egytalk_connect.php');
    $username = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW);
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindValue(":username", $username);

    $stmt->execute();

    if ($stmt->rowCount() != 1)  header("Location: login.php");

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['password'])) {
        $_SESSION = array();
        session_start();

        $_SESSION['uid'] = $user['uid'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['surname'] . " " . $user['firstname'];

        $_SESSION['logged_in'] = true;
        header("Location: index.php");
    }
}
function signup()
{
    if (!isset($_POST['firstName'], $_POST['surName'], $_POST['username'], $_POST['password'])) {
        header("Location: login.php");
        exit();
    }

    include_once('../inc/egytalk_connect.php');
    $uid = random_bytes(16);
    $uid[6] = chr((ord($uid[6]) & 0x0f) | 0x40);
    $uid[8] = chr((ord($uid[8]) & 0x3f) | 0x80);
    $uid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($uid), 4));

    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $surName = filter_input(INPUT_POST, 'surName', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $stmt = $db->prepare("INSERT INTO user(uid, firstname, surname, username, password) VALUES(:uid, :fn, :sn,:user,:pwd)");

    $stmt->bindValue(":uid", $uid);
    $stmt->bindValue(":fn", $firstName);
    $stmt->bindValue(":sn", $surName);
    $stmt->bindValue(":user", $username);
    $stmt->bindValue(":pwd", $password);

    try {
        $stmt->execute();

        $_SESSION = array();
        session_start();

        $_SESSION['uid'] = $uuid;
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $firstName . " " . $surName;
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
    } catch (Exception $e) {
        header("Location: login.php");
        exit();
    }
}

function logout()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_POST = array();
    $_SESSION = array(); // Tömmer sessionsarrayen    
    session_regenerate_id(true);

    header("Location: index.php");
    exit();
}
