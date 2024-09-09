<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $name = "<hr><p>Från: " . $_SESSION['username'] . "</p>";
  $msg = "<p>" . cleanData($_POST['message']) . "</p>";

  file_put_contents("../../../M3-06-messages.dat", $name . $msg, FILE_APPEND);

  header("location: index.php?page=klotter"); //Omdirigerar till klotterplanket

  function cleanData($data)
  {
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
