<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M6 | 04</title>
</head>
<body>
    <form method="post" action="userManipulation.php">
        <input type="hidden" name="login">
        <label>Username: </label>
        <input type="text" name="username"> <br><br>
        <label>Password: </label>
        <input type="password" name="password"> <br><br>
        <input type="submit" value="Log In"> <br><br><br><br>
    </form>

    <form method="post" action="userManipulation.php">
        <input type="hidden" name="signup">
        <label>Name: </label>
        <input type="text" name="firstName"> <br><br>
        <label>Surname: </label>
        <input type="text" name="surName"> <br><br>
        <label>Username: </label>
        <input type="text" name="username"> <br><br>
        <label>Password: </label>
        <input type="password" name="password"> <br><br>
        <input type="submit" value="Sign Up"> <br><br><br><br>
    </form>

    <form method="post" action="userManipulation.php">
        <input type="hidden" name="logout">
        <input type="submit" value="Log Out"> <br><br>
    </form>
</body>
</html>