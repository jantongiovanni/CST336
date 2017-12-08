<?php
include 'dbConnection.php';
$dbConn = getDatabaseConnection("midterm");

echo "Average Price of all games: ";
$sql= "SELECT AVG(gamePrice) FROM `games_list`";
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
echo $record['AVG(gamePrice)'];
}

echo "<br /> <br />";

echo"All games with positive reviews: <br />";
$sql= "SELECT gameName, gameReview FROM `games_list` WHERE gameReview LIKE '%Positive%' ";
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
echo $record['gameName'] . " | " . $record['gameReview'] . "<br /> ";
}

echo "<br /> <br />";

echo"All games released this year: <br />";
$sql= "SELECT gameName, gameRelease FROM `games_list` WHERE gameRelease LIKE '%2017%'";
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
echo $record['gameName'] . " | " . $record['gameRelease'] . "<br /> ";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
        <style>
            body {
                text-align: center;
                background-color: #152B42;
                font-family: 'Quicksand', sans-serif;
                color: #FFFFFF ;
                font-size: 125%;
            }
        </style>
            <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">    
        </head>
    <body>

    </body>
</html>