<?php

if(isset($_FILES["myFile"])) {
    $maxsize    = 1048576;
    
    if($_FILES['uploaded_file']['size'] >= $maxsize) {
        $errors[] = 'File too large. File must be less than 1 megabytes.';
        $message = "File Size Too Large";
       echo "<script type='text/javascript'>alert('$message');</script>";
        }
    else{
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );}

   
}


  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
  
  $files = scandir("gallery/", 1);
 // print_r($files);
  
  for ($i = 0; $i < count($files) - 2; $i++) {
    // echo "<div id='img' class='img'>";
     //echo "<img src='gallery/" .   $files[$i] . "   ' width='50' >";
    // echo "</div>";
    echo "<a href='gallery/" .   $files[$i] . "'><img src='gallery/" .   $files[$i] . "   ' width='50' alt='your alt description here'></a>";

  }
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
/*        $(document).ready(function() {
     $("#img").click(function(){
       $.modal("<img src=\"test.php_files/aveskulov-large.jpg\" style=\"\"/>");
     });
});*/
        
       /* $(document).ready(function()
        {
            $('#img').on('click', function ()
            {
                $(this).width(500);
            });
        });*/
           
          /* var $img = $('img'); // finds all image tags

            $img.click(function resize(e) { // bind click event to all images
              $img.css({ // resize the image
                 height: '300px',
                 width: '300px'
              });
            });     */
                    
       /* $(document).ready(function(){
        $('.imageContainer').click(function(){
                    $(this).width(1000);
        });
    });
           */ 
        </script>
        
        <style>
         @import url('https://fonts.googleapis.com/css?family=Spectral+SC');
         h1{
            font-family: 'Spectral SC', serif;
            
         }
        #button{
            background-color: #e7e7e7; 
            color: black;
            border-radius: 8px;
            border: 2px solid #4CAF50;
        }
        #button:hover {
            background-color: #4CAF50; /* Green */
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        
        #button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        
        
        </style>
    </head>
    <body>

    <h1> Photo Gallery </h1>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" id = "browse_button"/> 
        
        <input type="submit" value="Upload File!" id="button"/>

    </form>


    </body>
</html>