<?php
if (isset($_POST['login'])) login();
else if (isset($_POST['signup'])) login();
else if (isset($_POST['logout'])) logout();
else {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  #header("Location: login.php");
}

if (file_exists("../../../M3-04-hit.dat")) {
  $hit = file_get_contents("../../../M3-04-hit.dat");
}
echo $hit;

function login()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['logged_in'] = true;

    $hit = 0;
    if (file_exists("../../../M3-04-hit.dat")) {
      $hit = file_get_contents("../../../M3-04-hit.dat");
    }
    $hit++; // Ökar antalet besökare med 1

    file_put_contents("../../../M3-04-hit.dat", $hit);
  }
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