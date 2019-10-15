<?php
    $rows = 2;
    $placesPerRow = 5;
    $schemeOfTheRow = array_fill(1, $placesPerRow, 'false');
    $schemeOfTheHall = array_fill(1, $rows, $schemeOfTheRow);
    $schemeOfTheHall[1][1] = 'true';
    $schemeOfTheHall[1][4] = 'true';

    var_dump($schemeOfTheHall);

    $requiredPlaces = 3;

    function reserve($schemeOfTheHall, $requiredPlaces){
        $vacantPlaces = 0;
        for ($i = 1; $i <= count($schemeOfTheHall); $i++) {            
            for ($m = 1; $m < (count($schemeOfTheHall[$i]) - $requiredPlaces + 1); $m++) {
                if ($schemeOfTheHall[$i][$m] === 'false') {
                    $vacantPlaces++;
                    if ($vacantPlaces === $requiredPlaces) {
                        $numberOfPlaces = $m + ($requiredPlaces - 1);
                        echo "Ряд $i, места c $m по $numberOfPlaces.";
                    };
                };                
            };
        }; 
    };
    reserve($schemeOfTheHall, $requiredPlaces);