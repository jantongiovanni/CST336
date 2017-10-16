<?php


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Computer Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">
    </head>
    <body>
    
    <div class="logo">
        <a href="https://fonts.googleapis.com/css?family=Monda">COMPUTER KNOWLEDGE QUIZ</a>
    </div>

        <form action="confirmation.php" method="post">
            <div class="questions">
                Name: <input type="text" name="fullName" size="25" />   <br /><br />
            </div>
            
            <h3>1. What does "GPU" stand for?</h3>
            <div class="questions">
                <input type="radio" id="item1" name="gpuChoice" value="Graphics Processing Unit"/>
                    <label for="item1">Graphics Processing Unit</label> <br>
                <input type="radio" id="item2" name="gpuChoice" value="Graphics Production Unit"/>
                    <label for="item2">Graphics Production Unit</label> <br>
                <br />
            </div>
            
            <h3>2. Which of these are real programming languages?</h3>
            <div class="questions">
                <input type="checkbox" id="lang1" name="lang[]" value="Java">
                    <label for="lang1"> Java </label> <br>
                <input type="checkbox" id="lang2" name="lang[]" value="Viper">
                    <label for="lang2"> Viper </label> <br>
                <input type="checkbox" id="lang3" name="lang[]" value="C++">
                    <label for="lang3"> C++ </label> <br>
                <input type="checkbox" id="lang4" name="lang[]" value="Python">
                    <label for="lang4"> Python </label> <br>
                <input type="checkbox" id="lang5" name="lang[]" value="Diamond">
                    <label for="lang5"> Diamond </label> <br>
                <br />
            </div>
                
            
            <h3>3. Which of these is a typical CPU clock speed?</h3>
             <div class="questions">
                <input type="radio" id="clock1" name="cpuChoice" value="4 kHz"/>
                    <label for="clock1">4 KHz</label> <br>
                <input type="radio" id="clock2" name="cpuChoice" value="4 MHz"/>
                    <label for="clock2">4 MHz</label> <br>
                <input type="radio" id="clock3" name="cpuChoice" value="4 GHz"/>
                    <label for="clock3">4 GHz</label> <br>
                <input type="radio" id="clock4" name="cpuChoice" value="4 THz"/>
                    <label for="clock4">4 THz</label> <br>
                <br />
            </div>
            
            <h3>4. Can an HDMI cable display a refresh rate above 60Hz?</h3>
             <div class="questions">
                <input type="radio" id="hdmi1" name="hdmiChoice" value="Yes"/>
                    <label for="hdmi1">Yes</label> <br>
                <input type="radio" id="hdmi2" name="hdmiChoice" value="No"/>
                    <label for="hdmi2">No</label> <br>
                <br />
            </div>
            
            
            <input type="submit" class="button" name="sendfeedback" value="Submit Data"/>
        
        </form>
    </body>
</html>