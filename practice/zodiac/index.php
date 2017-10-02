<?php
function year($startyear, $endyear)
{
    if(isset($_GET["startyear"], $_GET["endyear"]))
    {
    $startyear = $_GET["startyear"];
    $endyear = $_GET["endyear"];
    }
    
    
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
     $yearsum = 0;
       $count = 0;
     for($i=$startyear; $i<=$endyear; $i+=4)
        {
            
      
        $yearsum+=$i;
            echo "<li>"  . $i;
            if($i == 1776)
            {
               echo "<strong> USA INDEPENDENCE!</strong>";
            }
            if($i%100==0)
            {
                echo "<strong> Happy New Century</strong>";
            }
                 echo "</li>";
             echo "<img class='image-object' src='img/".$zodiac[$count%12].".png' alt='Picture of animal'>";
             $count++;
            
   
        }
        echo $yearsum;
        return $yearsum;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Zodiac </title>
    </head>
    <body>
        
        <h1> Chinese Zodiac List </h1>
        
        <ul> 
        <?php     
        year(1900,200);
        
        ?>
        </ul>

    </body>
</html>