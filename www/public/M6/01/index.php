<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M6 | 01</title>
</head>
<body>
<?php
    include_once('../inc/egytalk_connect.php');    

    /* Kör frågan mot databasen world och tabellen country */
    $stmt = $db->prepare("SELECT Name, Population FROM country WHERE Name LIKE 'Z%' ORDER BY Population DESC");    
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach( $result as $row ){
        echo "<strong>Country: </strong>".$row['Name'];
        echo " <strong>Population: </strong>".$row['Population'];
        echo "<br /><hr />";
    }
?>
</body>
</html>