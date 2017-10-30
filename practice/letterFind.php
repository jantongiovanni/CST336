<?php
$alphabet = range("A", "Z");
function showLetters(){
    global $alphabet;
    foreach($alphabet as $letter)
    echo "<option value='$letter'>$letter</option>";
}

function sameLetter(){
    $letterToFind = $_GET['letterToFind'];
    $letterToOmit = $_GET['letterToOmit'];
    
    echo $letterToFind;
    echo $letterToOmit;
if($letterToFind == $letterToOmit)
    {
        echo "Error";
    }
else{
        echo "All good";
    }
}

function createTable(){
    
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Find the Letter</title>
    </head>
    <body>
        
        <form method = 'get'>
            Select a letter to find
            <select name="letterToFind">
                <?=showLetters()?>
            </select>
            
            <br />
            Select a grid size
            <select name="tableSize">
                <option value="6">6 x 6</option>
                <option value="7">7 x 7</option>
                <option value="8">8 x 8</option>
                <option value="9">9 x 9</option>
                <option value="10">10 x 10</option>
            </select>
            
            <br />
            Select a letter to omit
            <select name="letterToOmit">
                <?=showLetters()?>
            </select>
            
            <br />
            <input type="submit" value="Create Table" name="submit" />
            
        </form>
        
        <?=sameLetter()?>

    </body>
</html>