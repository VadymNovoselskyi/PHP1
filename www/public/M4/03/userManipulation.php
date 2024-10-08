<!DOCTYPE html>
<html lang="se">

<head>
    <meta charset="UTF-8">
    <title>Person write</title>
</head>

<body>

    <?php
    include("User.php");

    function addUser($user)
    {
        $file = "../../../userData/M4-03-users.dat";

        if(file_exists($file)) {
            $users = unserialize(file_get_contents($file));
            $users[] = $user; 
            file_put_contents($file, serialize($users));
        }
        else {
            $users = array();
            $users[] = $user; 
            file_put_contents($file, serialize($users));
        }
        
    }

    function isPresent($userToFind)
    {
        $file = "../../../userData/M4-03-users.dat";
        if (file_exists($file)) {
            $userArray = unserialize(file_get_contents($file));
        }
        else return false;

        foreach($userArray as $user) {
            if($userToFind->getUsername() == $user->getUsername() && password_verify($userToFind->getPassword(), $user->getPassword())) return true;
        }
        return false;
    }
    ?>
</body>

</html>