<h1>Klotterplanket</h1>
<form action="saveMsg.php" method="post">
    <?php
    echo '<label>Namn</label><br>';
    echo '<input type="text" value="' . $_SESSION['username'] .'" disabled name="name"> <br/>';
    ?>
    <label>Meddelande</label><br>
    <textarea name="message" cols="45" rows="5"></textarea> <br/>    
    <input type="submit" value="Skicka">
</form>

<?php 
    if(file_exists("../../../M3-06-messages.dat")) {
        echo file_get_contents("../../../M3-06-messages.dat");
    }
?>