<?php

        
        
    function getCard(){    
    for($i=1; $i<2; $i++){
            ${"randomValue" . $i } = rand(0,4);
            displayCard(${"cardValue" . $i}, $i );
        }
       /* displayPoints($cardValue1, $cardValue2);*/
    
    }

 function getSuit(){
     for($i=1; $i<2; $i++){
            ${"randomValue" . $i } = rand(0,3);
            displaySuit(${"suitValue" . $i}, $i );
        }
        }







function displaySuit($suitValue, $pos){
         
            
            
            switch ($suitValue){
                case 0: $symbol = "clubs";
                        break;
                case 1: $symbol = "diamonds";
                        break;
                case 2: $symbol = "hearts";
                        break;
                case 3: $symbol = "spades";
            }
            
            return "/img/$symbol";
        }    

function displayCard($cardValue, $pos){
            switch ($cardValue){
                case 0: $symbol = "ace";
                        break;
                case 1: $symbol = "jack";
                        break;
                case 2: $symbol = "queen";
                        break;
                case 3: $symbol = "king";
                        break;
                case 4: $symbol = "ten";
                        break;
            }
            
            echo "<img id='reel$pos' src='".getSuit()."/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "' width='70'/>";
        }    
        




?>

