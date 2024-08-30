<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M2 08</title>
</head>

<body>
  <form action="handle.php" method="post">
    <fieldset>
      <legend>Login</legend>
      <input type="hidden" name="login">
      <label>Your username: </label>
      <input type="text" name="username"> <br> <br>
      <label>Your password: </label>
      <input type="password" name="password"> <br> <br>
      <input type="submit" value="Submit">
    </fieldset>
  </form>

  <br>
  <br>
  <br>

  <form action="handle.php" method="post">
    <fieldset>
      <legend>Signup</legend>
      <input type="hidden" name="signup">
      <label>Your username: </label>
      <input type="text" name="username"> <br> <br>
      <label>Your password: </label>
      <input type="password" name="password"> <br> <br>
      <input type="submit" value="Submit">
    </fieldset>
  </form>
</body>
</html>