<?php
    $csv = array_map('str_getcsv', file('data.csv'));
    $json = [];
    $keys = str_getcsv($csv[0][0], ';');
    $name = $keys[0];
    $art = $keys[1];
    $price = $keys[2];

    for ($i = 1; $i < count($csv); $i++) {
        $value = str_getcsv($csv[$i][0], ';');
        $json[] = [
            $name => $value[0],
            $art => $value[1],
            $price => $value[2],            
        ];
    };
    file_put_contents('data.json', json_encode($json));