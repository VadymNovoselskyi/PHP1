<?php
if (!isset($_SESSION['logged_in'])) {
    echo "<h1>No login </h1>";
}
else {
?>
<h1>Klotterplanket</h1>
<form action="saveMsg.php" method="post">
    <label>Namn</label><br>
    <input type="text" name="name"><br />

    <label>Meddelande</label><br>
    <textarea name="message" cols="45" rows="5"></textarea><br />    
    <input type="submit" value="Skicka">
</form>

<?php 
    if(file_exists("../../../M3-06-messages.dat")) {
        echo file_get_contents("../../../M3-06-messages.dat");
    }
}
    ?>