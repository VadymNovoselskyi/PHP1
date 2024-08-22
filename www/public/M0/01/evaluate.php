<!doctype html>
<html>
<head lang="sv"></head>
<body>
<h1>Matematiktest</h1>
<h2>Resultat</h2>
<?php
     	$ans1 = $_POST['q1'];
     	$ans2 = $_POST['q2'];
      $ans3 = $_POST['q3'];
      $ans4 = $_POST['q4'];
      $ans5 = $_POST['q5'];
     	$points = 0;
     	
     	if($ans1 == 9)
           $points++;
     	if($ans2 == 15)
           $points++;
      if($ans3 == -2)
         $points++;
      if($ans4 == 5)
         $points++;
      if($ans5 == 56)
         $points++;
     	
     	echo("<p>Du fick " . $points . " av 5 möjliga</p>");
      echo("<p> Ans01: " . $ans1 . "; ans02: " . $ans2);

?>
<form action="index.html">
   <input type="submit" value="Go Back">
</form>
</body>
</html>