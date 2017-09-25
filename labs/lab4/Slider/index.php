<?php

$backgroundImage = "img/sea.jpg";

if(isset($_GET['keyword'])) //checks for parameter in url
echo "Keyword typed: " . $_GET['keyword'];
else
  echo "<h2>Type a keyword to display a slideshow of random images from Pixabay.com</h2>";
  
  
if(isset($_GET['keyword'])){
    include 'api/pixabayAPI.php';
    $imageURLS = getImageURLs($_GET['keyword']);
    
    for($i = 0; $i<5; $i++){
    do{
       $randomIndex = rand(0, count($imageURLS));
    }
    while (!isset($imageURLS[$randomIndex]));
    echo "<img src='" . $imageURLS[$randomIndex] . "' width='200' >";
    unset($imageURLS[$randomIndex]);
        
        
    }
        
        
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
          @import url("css/styles.css");
          
          body {
              
              background-image:url('<?=$backgroundImage?>');
              
          }
          
        </style>
    </head>
    <body>

      

        <form method="GET"> <!--default is the get method which displays keywork in url, post method does not -->
            
            <input type="text" name="keyword" placeholder="Type Keyword"/>
            <input type="submit" value="Search"/>
            
        </form>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>