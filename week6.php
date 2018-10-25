<?php
    //echo md5('desire');
    //Quiz 1
    echo nl2br("A highly motivated and hardworking individual, who just graduated from biochemistry,
        University of Benin and is passionate about going into tech, mainly web development. \n
        Staying focused on my career goal and objective and have been on the lookout for platform 
        where I can be nurtured and giving a well-structured training to help me actualize my dream. <br>");

    //Quiz 2
    $num1 = 5;
    $num2 = 6;
    $num3 = 3;

    $result1 = $num1 * $num3; //output 15 '*' is the sign for multiplication
    $result2 = $num1 - $num2; //output -1 '-' is the sign for substraction
    $result3 = $num3 / $num2; //output 0.5 '/' is the sign for division

    //Quiz 3
    $temperature = 34;
    if ($temperature <= 20) {
        echo "it is really cold here <br>";
    } elseif ($temperature > 20 && $temperature < 30){
        echo "The weather is just perfect <br>";
    } elseif ($temperature >= 30 && $temperature < 40) {
        echo "it's so hot today <br>";
    } elseif ($temperature >= 40){
        echo "Am i in the sahara desert <br>";
    } else {
        return false;
    }
   
    //Quiz 4
    $num = 100;
    while ($num <= 150) {
        $num++;
    }

    $evenNum = 0;
    $counter = 0;
    while ($evenNum <= 50) {
        if ($evenNum % 2 == 0) {
            $counter = $counter + 1;
            echo $counter. ". Even number: ".$evenNum."<br>";
        }
        $evenNum++;
    }

    //Quiz 5
    $names = array('mary', 'faith', 'adaa');
    $hob = array('swimming', 'traveling', 'learning');
    $arrlength = count($names);

    for($i = 0; $i < $arrlength; $i++) {
        echo "My name is ".$names[$i].". I love ".$hob[$i]."<br>";
    }

    //OR

    $person = array ('mary'=>'swimming', 'faith'=>'hanging out', 'adaa'=>'learning new things');

    foreach ($person as $firstname => $hobby){
        echo "My name is ".$firstname.". I love ".$hobby."<br>";
    }

    //Quiz 6
    function Arithemetic($a, $b) {
        $add = $a + $b;
        echo "the sum of a and b = ".$add."<br>";

        $product = $a * $b;
        echo "the product of a and b = ".$product."<br>";
    }
    Arithemetic(6, 7);
?>
