<?php
session_start();
 if (!isset($_SESSION['username'])) { //checks whether admin has logged in
     header("Location: login.php");
     exit();
 }
include 'dbConnection.php';
$conn = getDatabaseConnection();

function getAllGenres() {
    global $conn;
    $sql = "SELECT * 
            FROM game_genre";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $genre = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($classes);
    foreach ($genre as $gn) {
      echo "<option value='" . $gn['genreName'] . "'>" . $gn['genreName'] . "</option>";
    }
}

function getItems() {
    global $conn;
    $namedParameters = array();
    
    $sql = "SELECT gameId, gameName, genreName, gameReview, gamePrice, gameRelease
            FROM `games_list` 
            WHERE 1";
            
    if(isset($_GET['submit'])) {
        if (isset($_GET['gameSearch'])) {
            $sql .= " AND gameName LIKE :gameName";
            $namedParameters[':gameName'] = "%" . $_GET['gameSearch'] . "%";
        }
        if (isset($_GET['gameGenre'])) {
            $sql .= " AND genreName = :genreName ";
            $namedParameters[':genreName'] = $_GET['gameGenre'];
        }
        if ($_GET['sort'] == 'desc') {
            $sql .= " ORDER BY gameName desc";
        }
        if ($_GET['sort'] == 'asc') {
            $sql .= " ORDER BY gameName";
        }
    }
            
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $r) {
        echo "<div class='game'>";
        echo    "<details>";
        echo        "<summary>" . $r['gameName'] . "</summary>";
        echo        "<p> Game Price: " . $r['gamePrice'] . "</p>";
        echo        "<p> Genre:  " . $r['genreName'] . "</p>";
        echo        "<p> Reviews:  " . $r['gameReview'] . "</p>";
        echo        "<p> Released:  " . $r['gameRelease'] . "</p>";
        echo        "[<a href='updateGame.php?gameId=".$r['gameId']."'> Update </a> ]";
        echo        "<form action='deleteGame.php' style='display:inline' onsubmit='return confirmDelete(\"".$r['gameName']."\")'>
                     <input type='hidden' name='gameId' value='".$r['gameId']."' />
                     <input type='submit' value='Delete'></form>";
        echo        "</form>";
        echo    "</details>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <h2> Welcome <?=$_SESSION['username']?>! </h2>
        <style>
            body {
                text-align: center;
                background-color: #152B42;
                font-family: 'Quicksand', sans-serif;
                color:white;
                font-size: 125%;
            }
        </style>
        <link href="main.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    </head>
    <body>
        <h1>Games List</h1>
        <a href="reports.php">Generate game reports</a>
        <hr>
        <form action="addGame.php" style="display: inline-block;">
            <input type="submit" value="Add new Game" />
        </form>
        <form action="logout.php" style="display: inline-block;">
            <input type="submit" value="Logout" />
        </form>
        <form>
            <fieldset style='border-radius:25px; width:700px; margin: 0 auto;'>
            <input type="text" name="gameSearch" placeholder="Search Name">
            <select name="gameGenre">
                <option disabled selected value value>Select Genre</option>
                <?=getAllGenres()?>
            </select></br>
            Sort games by:</br>
            <input type="radio" name="sort" value="desc" class="rad" checked> Descending </br>
            <input type="radio" name="sort" value="asc" class="rad"> Ascending </br></br>
            <input type="submit" name="submit" value="Search!">
            </fieldset>        
        </form>
        <?=getItems()?>
    </body>
</html>