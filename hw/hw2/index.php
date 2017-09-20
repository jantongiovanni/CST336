<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gamertag Generator</title>
        <meta charset="utf-8"/>
        <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Roboto');
        </style>
    </head>
    <body>
        <h1>Gamertag Generator</h1>
        <figure id="xbox">
                <img src="img/xbox.png" alt="xbox 360 logo" />
            </figure>
            <br />
            <br />
        <div id="main">
            <?php
                name();
            ?>
        </div>
    </body>
</html>