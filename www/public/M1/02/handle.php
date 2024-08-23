<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Years to pensoin</title>
</head>
<body>
<h1>Years to pensoin</h1>
<?php
    $name = $_POST['name'];
    $age = $_POST['age'];
    $to_pension = 65 - $age;
    echo "<p>$name has $to_pension years to pension";
?>
</body>
</html>