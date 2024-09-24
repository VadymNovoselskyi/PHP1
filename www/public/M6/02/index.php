<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M6 | 02</title>
</head>
<body>
    <form method="post">
        <label>City: </label>
        <input type="text" name="city">
        
        <input type="submit" value="Submit"> <br><br>
    </form>

    <?php
        include_once('../inc/world_connect.php');    

        if(isset($_POST['city']) && $_POST['city'] != '') $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        else $city = 'Malmö';
        /* Kör frågan mot databasen world och tabellen country */
        $stmt = $db->prepare("SELECT Name, Population FROM city WHERE Name LIKE :city ORDER BY Name");    
        $stmt->bindValue(":city", "$city%", PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach( $result as $row ){
            echo "<strong>City: </strong>".$row['Name'];
            echo " <strong>Population: </strong>".$row['Population'];
            echo "<br /><hr />";
        }
    ?>
</body>
</html>