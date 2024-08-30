<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 08</title>
</head>

<body>
    <?php
    include("userManipulation.php");

    if (isset($_POST["username"])) $username = $_POST["username"];
    if (isset($_POST["password"])) $password = $_POST["password"];
    $username = cleanData($username);
    $user = new User($username, $password);

    if (isset($_POST["login"])) {
        if (isPresent($user)) {
            echo "User: " . $user->getUsername();
            echo "<br>Pass: " . $user->getPassword();
        } else {
            header("Location: index.php");
            exit();
        }
    }
    else if(isset($_POST["signup"])) {
        addUser($user);
        header("Location: index.php");
        exit();
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
</body>

</html>