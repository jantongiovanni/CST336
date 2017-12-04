<?php
    include 'inc/header.php';
?>


<?php
    if(!isset($_GET['keyword'])) {  //form has not been submitted
        echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
    } else {   //form has been submitted
        
         if (empty($_GET['keyword'])  && empty($_GET['category'])  ) {
    
                echo "<h2 style='color:red'> Error! You must enter a keyword or category </h2>";
                return;
                exit;
         }
?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
            for($i = 0; $i < 7; $i++) {
                echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                echo ($i == 0) ? "class='active'" : "";
                echo "></li>";
            }
        ?>
    </ol>
    
    <div class="carousel-inner" role="listbox">
        <?php
            for($i = 0; $i < 7; $i++) {
                do {
                    $randomIndex = rand(0, count($imageURLs));
                } while(!isset($imageURLs[$randomIndex])); 
                
                echo '<div class="item ';
                echo ($i == 0) ? "active" : "";
                echo '">';
                echo '<img src="' . $imageURLs[$randomIndex] . '">';
                echo '</div>';
                unset($imageURLs[$randomIndex]);
            }
        ?>
    </div>
    
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <?php
        }
    ?>
    <br>
   
            
            
            
            
            
            
            
        <!-- add Carousel component -->
        <br /><br />
        <a class="btn btn-outline-primary" href="adoptions.php" role="button">Adopt Now! </a>

        <br /><br />
        <hr>
        
<?php
    include 'inc/footer.php';


//add carousel in the home page to complete lab
?>

