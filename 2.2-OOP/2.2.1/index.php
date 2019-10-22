<?php
    include 'autoload.php';
    include 'config/SystemConfig.php';
    $firstJsonObject = new JsonFileAccessModel('data');
    $secondJsonObject = new JsonFileAccessModel('data2');

    $readFirstJsonObject = $firstJsonObject->readJson();
    var_dump($readFirstJsonObject);