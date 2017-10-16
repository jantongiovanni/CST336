<?php
//use pdo to connect to database
$host = 'localhost';
$dbname = 'tcp';
$username = 'root';
$password = '';
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

function getUsersandDepartments(){
    global $dbConn;
    $sql = "SELECT firstName, lastName, deviceType FROM `tc_user` u 
INNER JOIN tc_checkout c ON u.userId = c.userId
INNER JOIN tc_device d ON  c.deviceId = d.deviceId
WHERE deviceType = 'tablet'";

    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
   // print_r($records);
    foreach($records as $record){
        echo $record['firstName'] . " " . $record['lastName'] . " " . $record['deptName'] . "<br />";
    }
    
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>SQL Joins Practice</title>
    </head>
    <body>
        <h2>Users who checked out tablets</h2>
    
        <?=getUsersandDepartments()?>
    
    </body>
</html>