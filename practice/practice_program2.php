<?php
include '../includesdbConnection.php';

$conn = getDatabaseConnection();

function getPop1() {
    global $conn;
    $sql = "SELECT * FROM `mp_town` WHERE population > '50000' && population < 80000";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['deviceType'] . "</option>";
        
    }
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Practice Program 2</title>
    </head>
    <body>
        
        <?=getPop1()?>

    </body>
</html>