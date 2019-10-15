<?php
    $chairs = 50;
    $rows = 5;
    $placesPerRow = 8;
    $requiredRow = 3;
    $requiredPlace = 5;

    function generate($rows, $placesPerRow, $chairs){
        if (($rows*$placesPerRow) > $chairs) {
            return false;
        } else {
            $schemeOfTheRow = array_fill(1, $placesPerRow, 'false');
            $schemeOfTheHall = array_fill(1, $rows, $schemeOfTheRow);
            return $schemeOfTheHall;
        };
    };

    $map = generate($rows, $placesPerRow, $chairs);
        
    function reserve($map, $requiredRow, $requiredPlace){
        if ($map[$requiredRow][$requiredPlace] === 'false') {
            $map[$requiredRow][$requiredPlace] = 'true';
            return true;
        } else {
            return false;
        };
        if ($requiredRow < count($map) || $requiredPlace > count($map[$requiredRow])) {
            return false;
        }
    };

    $reverve = reserve($map, $requiredRow, $requiredPlace);
    
    function logReserve($row, $place, $result){
        if ($result) {
            echo "Ваше место забронировано! Ряд $row, место $place.".PHP_EOL;
        } else {
            echo "Что-то пошло не так=( Бронь не удалась.".PHP_EOL;
        }
    }

    logReserve($requiredRow, $requiredPlace, $reverve);