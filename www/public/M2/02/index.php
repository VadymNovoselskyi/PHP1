<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 | 02</title>
</head>
<body>
    <?php
      for($i = 1; $i <= 5.0; $i += 0.1) {
        echo " $i, ";
      }  
      $i = 1;
      echo "<br>";
      while($i <= 5.0) {
        echo " $i, ";
        $i += 0.1;
      }  
    ?>

</body>
</html>