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
}

function getGameInfo($gameId) {
    global $conn;    
    $sql = "SELECT * 
            FROM games_list
            WHERE gameId = $gameId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    return $record;
}

if (isset($_GET['updateGameForm'])) {
     $sql = "UPDATE games_list 
                SET gameName = :gName,
                    genreName = :gnrName,
                    gameReview = :gReview,
                    gamePrice = :gPrice,
                    gameRelease = :gRelease
              WHERE gameId = :gameId";
     
    $namedParameters = array();
    $namedParameters[':gName'] =  $_GET['gameName'];
    $namedParameters[':gnrName'] =  $_GET['genreName'];
    $namedParameters[':gReview'] =  $_GET['gameReview'];
    $namedParameters[':gPrice'] =  $_GET['gamePrice'];
    $namedParameters[':gRelease'] =  $_GET['gameRelease'];
    $namedParameters[':gameId'] = $_GET['gameId'];

    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "Game has been updated successfully! <br />";
    
}

if (isset($_GET['gameId'])) {
    $gameInfo = getGameInfo($_GET['gameId']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating Game </title>
        <style>
            body {
                text-align: left;
                background-color: #152B42;
                font-family: 'Quicksand', sans-serif;
                color: #FFFFFF ;
                font-size: 125%;
                
            }
        </style>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">     </head>
    </head>
    <body>
        <h1> Admin Section </h1>
        <h2> Updating Game Info </h2>
        <a href="admin.php">Return to Admin Main page</a>
        <fieldset>
            <legend> Update Game </legend>
            <form>
                <input type="hidden" name="gameId" value="<?=$gameInfo['gameId']?>" />
                Game Name: <input type="text" name="gameName" required value="<?=$gameInfo['gameName']?>"/> <br>
                Genre: <select name="genreName">
                <option value=""> Select One </option>
                    <?php
                        $genre = getGenre();
                        foreach ($genre as $g) {
                            echo "<option value='$g[genreName]'>$g[genreName]</option>";
                            if($g[genreName] == $gameInfo['genreName']) echo 'selected="selected"';
                        }
                    ?></select><br>
                Game Reviews: <input type="text" name="gameReview" required value="<?=$gameInfo['gameReview']?>"/> <br>
                Price: <input type="text" name="gamePrice" required value="<?=$gameInfo['gamePrice']?>"/> <br>
                Released: <input type="text" name="gameRelease" required value="<?=$gameInfo['gameRelease']?>"/> <br>
               <input type="submit" name="updateGameForm" value="Update Game!"/>
            </form>
        </fieldset>
    </body>
</html> 