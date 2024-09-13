<?php    
    $name = "<hr><p>Från: " . $_POST['name'] . "</p>";
    $msg = "<p>" . $_POST['message'] . "</p>";
    
    file_put_contents("../../../userData/M3-04-messages.dat",$name.$msg,FILE_APPEND);
    
    header("location: index.php?page=klotter"); //Omdirigerar till klotterplanket
?>