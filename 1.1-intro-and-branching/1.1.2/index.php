<?php
    $hours = date("H");
    $day = date("N");
    $image = "img/1.jpg";
    $firstText;
    $secondText;
    $thirdText;

    if ($hours >= 6) {
        $firstText = "Доброе утро!";
    } elseif ($hours >= 11) {
        $firstText = "Добрый день!";
    } elseif ($hours >= 18) {
        $firstText = "Добрый вечер!";
    } elseif ($hours >= 23 || $hours < 6) {
        $firstText = "Доброй ночи!";
    };

    if ($day === "1") {
        $secondText = "Сегодня понедельник.";
    } elseif ($day === "2") {
        $secondText = "Сегодня вторник.";
    } elseif ($day === "3") {
        $secondText = "Сегодня среда.";
    } elseif ($day === "4") {
        $secondText = "Сегодня четверг.";
    } elseif ($day === "5") {
        $secondText = "Сегодня пятница.";
    } elseif ($day === "6") {
        $secondText = "Сегодня суббота.";
    } elseif ($day === "7") {
        $secondText = "Сегодня воскресенье.";
        $thirdText = "Завтра лучший день чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00!";
        $image = "img/2.jpg";
    };
    
    if (($day === "1" && $hours < 9) || ($day === "2" && $hours < 9) || ($day === "3" && $hours < 9)) {
        $thirdText = "Сегодня - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 9.00.";
    };
    
    if (($day === "4" && $hours < 10) || ($day === "5" && $hours < 10) || ($day === "6" && $hours < 10)) {
        $thirdText = "Сегодня - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10.00.";
    };
    
    if (($day === "1" && ($hours >= 9 || $hours <= 18)) || ($day === "2" && ($hours >= 9 || $hours <= 18)) || ($day === "3" && ($hours >= 9 || $hours <= 18))) {
        $thirdText = "Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до 18.00.";
    } elseif (($day === "4" && ($hours >= 10 || $hours <= 18)) || ($day === "5" && ($hours >= 10 || $hours <= 18)) || ($day === "6" && ($hours >= 10 || $hours <= 18))) {
        $thirdText = "Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до 18.00";
    };
    
    if (($day === "1" || $day === "2" || $day === "3" || $day === "4" || $day === "5") && $hours > 18) {
        $thirdText = "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 9.00.";
    } elseif (($day === "3" || $day === "4" || $day === "5") && $hours > 18) {
        $thirdText = "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10.00.";
    } elseif ($day === "6" && $hours > 18) {
        $thirdText = "Завра выходной! Приходите в понедельник!";
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="img" style="background-image: url(<?= $image; ?>)">
        <div class="greeting">
            <h1><?= $firstText; ?></h1>
            <h2><?= $secondText; ?><br>
            <?= $thirdText; 
            ?></h2>
        </div>
    </div>
</body>
</html>