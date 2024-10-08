<?php
include("userManipulation.php");

if (isset($_POST['login'])) login();
else if (isset($_POST['signup'])) signup();
else if (isset($_POST['logout'])) logout();
else {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
}

function login()
{
  if (isset($_POST["username"])) $username = $_POST["username"];
  if (isset($_POST["password"])) $password = $_POST["password"];
  $username = filter_input(INPUT_POST, $username, FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_STRIPPED);

  $user = new User($username, $password);

  if (!isPresent($user)) {
    header("Location: login.php");
    exit();
  }
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  session_regenerate_id(true);
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
  
  $username = filter_input(INPUT_POST, $username, FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_STRIPPED);
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
  session_regenerate_id(true);
}

?>
<!doctype html>
<html lang="sv">

<head>
  <meta charset="UTF-8">
  <title>M4 | 02</title>
  <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
  <main>
  <form action="" method="post">
    <fieldset>
      <legend>Form</legend>
      <input type="hidden" name="message">
      <label>Your name: </label>
      <input type="text" name="name"> <br> <br>
      <label>Your message: </label>
      <input type="text" name="text"> <br> <br>
      <input type="submit" value="Submit">
    </fieldset>
  </form>

    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      echo "<h1>Logged in!</h1>";
    }
    else {
      echo "<h1>Not logged in!</h1>";
    }

    if(isset($_POST['message'])) {
      $safeName = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $safeMassage = filter_input(INPUT_POST, 'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      echo "<h3>Name - " . $safeName . "</h3>";
      echo "<p>Massage - " . $safeMassage . "</p>";
    }
    else {
      echo "<h3>No message!</h3>";
    }
    ?>
    <a href="login.php">Login</a>
  </main>
</body>

</html>