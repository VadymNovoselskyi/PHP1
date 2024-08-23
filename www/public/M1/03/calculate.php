<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculation Result</title>
</head>
<body>
    <?php
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $sum = $n1 + $n2;
    echo "<p>$n1 + $n2 = $sum</p>"
    ?>
</body>
</html>