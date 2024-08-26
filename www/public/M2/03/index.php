<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 02</title>
</head>
<body>
    <?php
      $page["head"] = "<h1>Välkommen</h1>";
      $page["main"] = "<p>Detta är innehållet på min sida</p>";
      $page["footer"] = "<hr><p>Min sidfoot</p>";
      
      foreach($page as $value) {
        echo $value;
      }
    ?>

</body>
</html>