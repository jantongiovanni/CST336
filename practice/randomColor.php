<?php
    function getRandomColor(){
        return "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,100)/100).");";

    }  
?>    

<!DOCTYPE html>
<html>
    <head>
        <title> Random Background Color</title>
        <meta charset="utf-8" />
        
        <style>
            
            body {
                /* backgound-color: rgba(15,20,200,.5); */
                <?php
                /*$red = rand(0,255);
                $green = rand(0,255);
                $blue = rand(0,255);
                $alpha = rand(0,100)/100;
                */
                echo "background-color: " . getRandomColor();
                ?>
            }
            
            h1 {
                <?php
                echo "color: " . getRandomColor();
                ?>
                
            }
            
            h2 {
                color: <?=getRandomColor()?>;
            }
            
        </style>
        
        <h1>Hello!</h1>
        <h2>Hello!!!</h2>
    </head>
    <body>

    </body>
</html>