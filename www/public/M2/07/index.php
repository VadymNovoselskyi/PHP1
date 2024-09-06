<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 | 07</title>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
}
    function cleanData($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    ?>





  <form action="" method="post">
    <fieldset >
      <legend>Login</legend>
      <label>Your name: </label>
      <input type="text" name="name">
      <label>Your surname: </label>
      <input type="text" name="surname"> <br> <br>
      <label>Your username: </label>
      <input type="text" name="username">
      <label>Your password: </label>
      <input type="text" name="password">
      <input type="submit" value="Submit">
    </fieldset>
  </form>
</body>
</html>