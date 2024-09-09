<?php
include("userManipulation.php");

if (isset($_POST['login'])) login();
else if (isset($_POST['signup'])) signup();
else if (isset($_POST['logout'])) logout();
else {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  #header("Location: login.php");
}

function login()
{
  if (isset($_POST["username"])) $username = $_POST["username"];
  if (isset($_POST["password"])) $password = $_POST["password"];
  $username = cleanData($username);

  $user = new User($username, $password);

  if (!isPresent($user)) {
    header("Location: login.php");
    exit();
  }
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $_SESSION['logged_in'] = true;
}
function signup() {
  if (isset($_POST["username"]) && $_POST["username"] != "") $username = $_POST["username"];
  else {
    header("Location: login.php");
    exit();
  }
  if (isset($_POST["password"]) && $_POST["password"] != "") $password = $_POST["password"];
  else {
    header("Location: login.php");
    exit();
  }
  
  $username = cleanData($username);
  $password = password_hash($password, PASSWORD_DEFAULT);

  $user = new User($username, $password);
  addUser($user);
  $_SESSION['logged_in'] = true;
}

function logout()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $_POST = array();
  $_SESSION = array(); // Tömmer sessionsarrayen    
  session_destroy();
  #header("Location: login.php");
}

function cleanData($data)
{
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}
?>
<!doctype html>
<html lang="sv">

<head>
  <meta charset="UTF-8">
  <title>M4 | 01</title>
  <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
  <main>
    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      echo "<h1>Logged in!</h1>";
    }
    else {
      echo "<h1>Not logged in!</h1>";
    }
    ?>
    <a href="login.php">Login</a>
  </main>
</body>

</html>