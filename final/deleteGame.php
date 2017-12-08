<?php
    include("dbConnection.php");
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM games_list
            WHERE gameId = " . $_GET['gameId'];

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
?>