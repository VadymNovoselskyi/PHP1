<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Valutan i kronor</h1>
<?php
    $dollar = $_POST['currency'];
    $sek = $dollar * 11;
    echo "<p>$dollar $  =  $sek kr</p>";
?>
</body>
</html>