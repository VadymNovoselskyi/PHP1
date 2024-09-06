<h1>Innehåll</h1>
<ul>
    <li><a href="index.php?page=start">Hem</a></li>
    <li><a href="index.php?page=blogg">Blogg</a></li>
    <li><a href="index.php?page=bilder">Bilder</a></li>
    <li><a href="index.php?page=kontakt">Kontakt</a></li>
    <?php
    if (isset($_SESSION['logged_in'])) {
        echo '<li><a href="index.php?page=klotter">Klotter</a></li>';
    }
    ?>
    <li><a href="login.php">Account</a></li>
</ul>