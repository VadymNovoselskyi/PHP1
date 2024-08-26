<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php
    $name = strip_tags($_GET['name'], "<br>");
    $age = strip_tags($_GET['age'], "<br>");
    echo "<p>Name - $name; Age - $age</p>"
    ?>
</body>
</html>