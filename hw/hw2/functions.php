<?php
function name(){
$flare = array(
    '420',
    '69',
    '97'
    );

    
$first = array(
    'Soul',
    'Swift',
    'l33t',
    'Frozen',
    'Sinister',
    'Legit',
    'Mystic',
    'Divine',
    'Dark',
    'Shadow',
    'Corrupt',
    'Insane',
    'Elite',
    'TryHard',
    'Captain',
    'Major',
    'Infinite',
    'Pro',
    'Sk8',
    'Faze',
    'Furious', 
    'Ninja'
    );    

$second = array(
    'Headshot',
    'Fire',
    'Chaos',
    'Killer',
    'Warrior',
    'Blood',
    'Assassin',
    'Night',
    'CheeseBurger',
    'Panda',
    'Kitten',
    'Overlord',
    'Gamer',
    'Pro',
    'Gamer',
    'Lord',
    'God',
    'Swag'
    );
    

    

function gen($first, $second){
$random_first = $first[mt_rand(0, sizeof($first)-1)];
$random_second = $second[mt_rand(0, sizeof($second)-1)];
$random_flare = $flare[my_rand(0,sizeof($flare)-1)];

if(rand(0,9)<7){
echo $random_first .'_'. $random_second;
    if(rand(0,9)<3)
    echo $random_flare;
}
else
echo 'xX'.$random_first.'_'.$random_second.'Xx';

}

function displayImg(){
    $rand = rand(1,3);
    echo "<img src='../hw2/img/gamerpics/$rand.png'/>";
   

}

for($i=0; $i<3; $i++){
    displayImg();
    echo str_repeat('&nbsp;', 4);
    gen($first, $second);
    echo "<br />";
    }
}


?>