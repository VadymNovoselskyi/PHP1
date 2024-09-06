<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 | 04</title>
</head>
<body>
    <?php
      include("math.php");
      $num1 = 6;
      $num2 = 3;

      echo "Number 1 = $num1; Number 2 = $num2 <br>";
      echo "Sum: " . sum($num1, $num2) . ". Difference: " .substract($num1, $num2) . ". Product: " . multiply($num1, $num2) . ". Division: " . divide($num1, $num2);
    ?>

</body>
</html>