<?php
if (!isset($_SESSION['logged_in'])) {
    echo "<h1>No login </h1>";
}
else {
?>
<h1>My gallery</h1>
<p>*Photo*</p>
<p>*Photo*</p>
<p>*Photo*</p>
<p>*Photo*</p>
<?php } ?>