<?php

function displaySymbol($symbol){
    
    echo "<img src='../labs/lab2/img/$symbol.png' width='70' />";
    
}

function printAll($symbols){
    for($i=0; $i<5; $i++){
        displaySymbol($symbols[$i]);
    }
}

$symbols = array("lemon", "orange", "cherry");


//print_r($symbols); //display array contents for debugging only

//echo $symbols[0];
//displaySymbol();

$symbols[] = "grapes" ; //adds element to end of array

//$symbols[2] = "blue" //replacing value

array_push($symbols, "bar"); //adds element at the end of the array

//displaySymbol($symbols[2]);
printAll($symbols);


sort($symbols); //order elements in ascending order

printAll($symbols);
//print_r($symbols);

shuffle($symbols); //random order
printAll($symbols);

rsort($symbols);
printAll($symbols);

//display random
displaySymbol($symbols[rand(0, count($symbols)-1)]);
displaySymbol($symbols[array_rand($symbols)]);
?>


<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>

    </body>
</html>