<?php

if($_POST && $_POST['fullName']!='' && isset($_POST['sendfeedback'], $_POST['fullName'], $_POST['gpuChoice'], $_POST['lang'], $_POST['cpuChoice'], $_POST['hdmiChoice']))
{
    $name = $_POST['fullName'];
    $correct = 0;
    $gpuChoice = $_POST['gpuChoice'];
    $lang = $_POST['lang'];
    $cpuChoice = $_POST['cpuChoice'];
    $hdmiChoice = $_POST['hdmiChoice'];
    
    echo "<span class=\"php\">Hello " . $_POST["fullName"] . "! <br /></span>";
    
    if($gpuChoice == "Graphics Processing Unit"){
    echo "<span class=\"php\">Question 1 correct <br /></span";
    $correct++;
    }
    else {
        echo "<span class=\"php\">Question 1 incorrect <br /></span>";
    }

    
    if(in_array('Java', $lang) && in_array('C++', $lang) && in_array('Python', $lang)){
        if(in_array('Viper', $lang) || in_array('Diamond', $lang)){
            echo "<span class=\"php\">Question 2 incorrect <br /></span>";
        }
        else{
            echo "<span class=\"php\">Question 2 correct <br /></span>";
            $correct++;
        }
    }
    else{
        echo "<span class=\"php\">Question 2 incorrect <br /></span>";
    }
    
    if($cpuChoice == "4 GHz"){
        echo "<span class=\"php\">Question 3 correct <br /></span>";
        $correct++;
    }
    else {
        echo "<span class=\"php\">Question 3 incorrect <br /></span>";
    }
    
    if($hdmiChoice == "No"){
        echo "<span class=\"php\">Question 4 correct <br /></span>";
        $correct++;
    }
    else {
        echo "<span class=\"php\">Question 4 incorrect <br /></span>";
    }
    
    echo "<br /><span class=\"php\">You got " . $correct . " out of 4 correct<br /></span>";
    if($correct>2){
        echo"<span class=\"php\">Well done!<br /></span>";
    }
    else{
         echo"<span class=\"php\">Time to brush up on your computer knowledge!!!<br /></span>";
    }
}

else
{
echo "<span class=\"php\">Please complete all fields and questions to see results!<br /></span>";
}

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
        
         <h3>1. What does "GPU" stand for?</h3>
            <div class="questions">
                <input type="radio" label="item1" name="gpuChoice" value="Graphics Processing Unit" <?php echo ($_REQUEST['gpuChoice'] == 'Graphics Processing Unit') ? 'checked="checked"' : ''; ?>/>
                    <label for="item1">Graphics Processing Unit</label> <br>
                <input type="radio" lable="item2" name="gpuChoice" value="Graphics Production Unit" <?php echo ($_REQUEST['gpuChoice'] == 'Graphics Production Unit') ? 'checked="checked"' : ''; ?>/>
                    <label for="item2">Graphics Production Unit</label> <br>
                <br />
                The correct answer is: <strong>Graphics Processing Unit</strong>
            </div>
            
             <h3>2. Which of these are real programming languages?</h3>
            <div class="questions">
                <input type="checkbox" label="lang1" name="lang[]" value="Java" <?php if(in_array('Java', $lang)) echo 'checked="checked"'  ?>/>
                    <label for="lang1"> Java </label> <br>
                <input type="checkbox" label="lang2" name="lang[]" value="Viper" <?php if(in_array('Viper', $lang)) echo 'checked="checked"'; ?>/>
                    <label for="lang2"> Viper </label> <br>
                <input type="checkbox" label="lang3" name="lang[]" value="C++" <?php if(in_array('C++', $lang)) echo 'checked="checked"'; ?>/>
                    <label for="lang3"> C++ </label> <br>
                <input type="checkbox" label="lang4" name="lang[]" value="Python" <?php if(in_array('Python', $lang)) echo 'checked="checked"'; ?>/>
                    <label for="lang4"> Python </label> <br>
                <input type="checkbox" label="lang5" name="lang[]" value="Diamond" <?php if(in_array('Diamond', $lang)) echo 'checked="checked"'; ?>/>
                    <label for="lang5"> Diamond </label> <br>
                <br />
                 The correct answer is: <strong>Java, C++, Python</strong>
            </div>
            
            <h3>3. Which of these is a typical CPU clock speed?</h3>
            <div class="questions">
                <input type="radio" label="clock1" name="cpuChoice" value="4 kHz" <?php echo ($_REQUEST['cpuChoice'] == '4 kHz') ? 'checked="checked"' : ''; ?>/>
                    <label for="clock1">4 KHz</label> <br>
                <input type="radio" lable="clock2" name="cpuChoice" value="4 MHz" <?php echo ($_REQUEST['cpuChoice'] == '4 MHz') ? 'checked="checked"' : ''; ?>/>
                    <label for="clock2">4 MHz</label> <br>
                <input type="radio" lable="clock3" name="cpuChoice" value="4 GHz" <?php echo ($_REQUEST['cpuChoice'] == '4 GHz') ? 'checked="checked"' : ''; ?>/>
                    <label for="clock3">4 GHz</label> <br>
                <input type="radio" lable="clock4" name="cpuChoice" value="4 THz" <?php echo ($_REQUEST['cpuChoice'] == '4 THz') ? 'checked="checked"' : ''; ?>/>
                    <label for="clock4">4 THz</label> <br>
                <br />
                The correct answer is: <strong>4 GHz</strong>
            </div>
            
             <h3>4. Can an HDMI cable display a refresh rate above 60Hz?</h3>
             <div class="questions">
                <input type="radio" label="hdmi1" name="hdmiCoice" value="Yes" <?php echo ($_REQUEST['hdmiChoice'] == 'Yes') ? 'checked="checked"' : ''; ?>/>
                    <label for="hdmi1">Yes</label> <br>
                <input type="radio" label="hdmi2" name="hdmiCoice" value="No" <?php echo ($_REQUEST['hdmiChoice'] == 'No') ? 'checked="checked"' : ''; ?>/>
                    <label for="hdmi2">No</label> <br>
                <br />
                The correct answer is: <strong>No</strong>

            </div>
                

    </body>
</html>