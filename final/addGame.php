<?php
session_start();
 if (!isset($_SESSION['username'])) { //checks whether admin has logged in
     header("Location: login.php");
     exit();
 }
include 'dbConnection.php';
$conn = getDatabaseConnection();

function getGenre() {
    global $conn;
    $namedParameters = array();
    
    $sql = "SELECT genreName, genreId
            FROM `game_genre` 
            WHERE 1";
            
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
 
    return $records;
    print_r($records);
}

if(isset($_GET['addGameForm'])){
    $gameName = $_GET['gameName'];
    $genreName = $_GET['genreName'];
    $gameReview = $_GET['gameReview'];
    $gamePrice = $_GET['gamePrice'];
    $gameRelease = $_GET['gameRelease'];
    
    $sql = "INSERT INTO games_list 
            (gameName, genreName, gameReview, gamePrice, gameRelease)
            VALUES (:gName, :gnrName, :gReview, :gPrice, :gRelease)";
    $namedParameters = array();
    $namedParameters[':gName'] =  $gameName;  
    $namedParameters[':gnrName'] =  $genreName; 
    $namedParameters[':gReview'] =  $gameReview;  
    $namedParameters[':gPrice'] =  $gamePrice;  
    $namedParameters[':gRelease'] =  $gameRelease;  

    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "Game has been added successfully!";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add New Game</title>
        <style>
            body {
                text-align: left;
                background-color: #152B42;
                font-family: 'Quicksand', sans-serif;
                color: #FFFFFF ;
                font-size: 125%;
            }
        </style>
        <a href="admin.php">Return to Admin Main page</a>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">     </head>
    </head>
    <body>
    <h1> Admin Section </h1>
        <h2> Adding New Game </h2>
        <fieldset>
        <legend> Add New Game </legend>
            <form>
            Game Name: <input type="text" name="gameName" required /> <br>
            Genre: <select name="genreName">
                <option value=""> Select One </option>
                <?php
                
                    $genre = getGenre();
                    foreach ($genre as $g) {
                        echo "<option value='$g[genreName]'>$g[genreName]</option>";}
                ?></select><br>
            Game Reviews: <input type="text" name="gameReview" required /> <br>
            Price: <input type="text" name="gamePrice" required /> <br>
            Released: <input type="text" name="gameRelease" required /> <br>
            <input type="submit" name="addGameForm" value="Add Game!"/>
            </form>
        </fieldset>
    </body>
</html>