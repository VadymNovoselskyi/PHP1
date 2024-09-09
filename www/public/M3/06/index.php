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

if (file_exists("../../../M3-06-hit.dat")) {
  $hit = file_get_contents("../../../M3-06-hit.dat");
  echo $hit;
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
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
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
  $user = new User($username, $password);
  addUser($user);
  incUserCount();
  $_SESSION['logged_in'] = true;
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
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

function incUserCount() {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();

    $hit = 0;
    if (file_exists("../../../M3-06-hit.dat")) {
      $hit = file_get_contents("../../../M3-06-hit.dat");
    }
    $hit++; // Ökar antalet besökare med 1

    file_put_contents("../../../M3-06-hit.dat", $hit);
  }
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
  <title>Länka in med PHP</title>
  <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="wrapper">
    <header>
      <?php include("inc/header.php"); ?>
    </header>
    <!-- header -->

    <section id="leftColumn">
      <nav>
        <?php include("inc/meny.php"); ?>
      </nav>
      <aside>
        <?php include("inc/aside.php"); ?>
      </aside>
    </section>
    <!-- End leftColumn -->

    <?php

    ?>

    <main>
      <section>
        <!-- Lägg in innehållet här -->
        <?php
        $page = "start";
        if (isset($_GET['page']))
          $page = $_GET['page'];

        switch ($page) {
          case 'blogg':
            include('pages/blogg.php');
            break;
          case 'bilder':
            include('pages/bilder.php');
            break;
          case 'kontakt':
            include('pages/kontakt.php');
            break;
          case 'klotter':
            include('pages/klotter.php');
            break;

          default:
            include('pages/start.php');
        }
        ?>
      </section>
    </main>
    <!-- End main -->

    <footer>
      <?php include('inc/footer.php'); ?>
    </footer>
    <!-- End footer -->

  </div>
  <!-- End wrapper -->
</body>

</html>