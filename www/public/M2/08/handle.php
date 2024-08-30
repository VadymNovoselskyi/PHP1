<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 08</title>
</head>
<body>
    <?php
    include("User.php");
    if(isset($_POST["username"])) $username = $_POST["username"];
    if(isset($_POST["password"])) $password = $_POST["password"];
    $username = cleanData($username);

    $newUser = new User($username, $password);
    echo "Hello: " . $newUser->getUsername();

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