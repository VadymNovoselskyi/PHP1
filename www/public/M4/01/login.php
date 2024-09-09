<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>    
    <form action="index.php" method="post">
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
    
      <form action="index.php" method="post">
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
    
      <br>
      <br>
    
      <form action="index.php" method="post">
        <fieldset>
          <legend>Logout</legend>
          <input type="hidden" name="logout">
          <input type="submit" value="Logout">
        </fieldset>
      </form>
</body>
</html>