<?php
    $rows = 2;
    $placesPerRow = 5;
    $schemeOfTheRow = array_fill(1, $placesPerRow, 'false');
    $schemeOfTheHall = array_fill(1, $rows, $schemeOfTheRow);
    $schemeOfTheHall[1][1] = 'true';
    $schemeOfTheHall[1][4] = 'true';

    $requiredPlaces = 2;

    function reserve($schemeOfTheHall, $requiredPlaces){
        $vacantPlaces;
        for ($i = 1; $i <= count($schemeOfTheHall); $i++) {
            $vacantPlaces = 0;            
            for ($m = 1; $m <= count($schemeOfTheHall[$i]); $m++) {   
                if ($schemeOfTheHall[$i][$m] === 'true') {
                    $vacantPlaces = 0;
                }; 
                if ($schemeOfTheHall[$i][$m] === 'false') {
                    $vacantPlaces++;
                    if ($vacantPlaces === $requiredPlaces) {
                        $numberOfPlaces = $m - $requiredPlaces + 1;
                        echo "Ряд $i, места c $numberOfPlaces по $m.";
                    };
                };  
            };
        }; 
    };
    reserve($schemeOfTheHall, $requiredPlaces);