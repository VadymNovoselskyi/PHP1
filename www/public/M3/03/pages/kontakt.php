<?php
if (!isset($_SESSION['logged_in'])) {
    echo "<h1>No login </h1>";
}
else {
?>
<h1>My contacts</h1>
<p>First contact</p>
<p>2nd contact</p>
<p>3rd contact</p>
<?php } ?>