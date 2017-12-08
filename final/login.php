<?php
session_start();
include 'dbConnection.php';

$conn = getDatabaseConnection();

function loginError() {
    global $conn;
    $userFlag = 0;
    $passFlag = 0;
    $sql = "SELECT * FROM game_users WHERE
            userName = :user";
            
    $namedParameters = array();
    $namedParameters[':user'] = $_POST['username'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($_POST['username']) && isset($_POST['username'])) {
        echo "<h3 style='color:red;'>Please enter your username</h3>";
    } else if($record['userName'] != $_POST['username']) {
        echo "<h3 style='color:red;'>Wrong username entered</h3>";
    } else if($record['userName'] == $_POST['username']) {
        $userFlag = 1;
    }
    
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $password = "";
    }
    
    if(empty($_POST['password']) && isset($_POST['password'])) {
        echo "<h3 style='color:red;'>Please enter your password</h3>";
    } else if($record['password'] != sha1($password) && $password != "") {
        echo "<h3 style='color:red;'>Wrong password entered</h3>";
    } else if($record['password'] == sha1($password)){
        $passFlag = 1;
    }
    
    if($passFlag && $userFlag) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header("Location: admin.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Game Catalog Login</title>
        <meta charset="utf-8" />
        <link href="login.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
    </head>
    <body>
        <div id="header">
            <h1><span>Admin Login</span></h1>
        </div>
        <div id="fields">
            <form method="post">
                <h3>Username: </h3><input type="text" name="username" placeholder="Username"> <br>
                <h3>Password: </h3><input type="password" name="password" placeholder="Password"> <br>
                <br>
                <div id="logBtn">
                    <input type="submit" value="Login!" name="login">
                </div>
                <?=loginError()?>
            </form>
        </div>
    </body>
</html>