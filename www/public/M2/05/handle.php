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

    $name = cleanData($name);
    $surname = cleanData($surname);
    $username = cleanData($username);
    $password = cleanData($password);

    echo "Name: " . $name . "<br>";
    echo "Surname: " . $surname . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";

    function cleanData($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
    ?>
</body>
</html>