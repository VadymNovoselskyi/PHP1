<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php
    $points = 0;
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];

    $result;

    if($q1 == "A") $points++;
    if($q2 == "B") $points++;
    if($q3 == "C") $points++;
    if($q4 == "D") $points++;
    if($q5 == "E") $points++;
    if($q6 == "F") $points++;

    if($points >= 5) $result = "Bra, du behärskar det mesta";
    else if($points >= 3) $result = "Godkänd";
    else $result = "Läs på mer och försök igen";
    

    echo "<p>$result, poäng - $points</p>"
    ?>
</body>
</html>