<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M6 | EgyTalk</title>
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

    <?php
        if(isset($_POST['firstName'],$_POST['surName'],$_POST['username'],$_POST['password'])){                
            include_once('../inc/egytalk_connect.php');    
            
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
            $surName = filter_input(INPUT_POST, 'surName', FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            

            $stmt= $db->prepare("INSERT INTO user(uid, firstname, surname, username, password) VALUES(UUID(), :fn, :sn,:user,:pwd)");
            
            $stmt->bindValue(":fn", $firstName);
            $stmt->bindValue(":sn", $surName);
            $stmt->bindValue(":user", $username);
            $stmt->bindValue(":pwd", $password);
            
            try{
                $stmt->execute();
                echo "Good";
            }catch(Exception $e){
                echo "Not good";
            }
        }
    ?>
</body>
</html>