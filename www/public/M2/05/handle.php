<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 05</title>
</head>
<body>
    <?php
    if(isset($_POST["name"])) $name = $_POST["name"];
    if(isset($_POST["surname"])) $surname = $_POST["surname"];
    if(isset($_POST["username"])) $username = $_POST["username"];
    if(isset($_POST["password"])) $password = $_POST["password"];

    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    $name = trim($name);
    $name = stripslashes($name);

    $surname = strip_tags($surname);
    $surname = htmlspecialchars($surname);
    $surname = trim($surname);
    $surname = stripslashes($surname);

    $username = strip_tags($username);
    $username = htmlspecialchars($username);
    $username = trim($username);
    $username = stripslashes($username);

    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
    $password = stripslashes($password);

    echo "Name: " . $name . "<br>";
    echo "Surname: " . $surname . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    ?>
</body>
</html>