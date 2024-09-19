<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M6 | 04</title>
</head>
<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) echo "<h1>Good</h1>";
    else echo "<h1> No good </h1>";
    ?>
    <a href="login.php">Log In</a>
</body>
</html>