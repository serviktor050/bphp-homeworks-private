<?php
    $users = [
        'admin' => 'admin1234',
        'randomUser' => 'somePassword',
        'janitor' => 'nimbus2000'
    ];

    session_start();

    if (isset($_POST['login'])) {
        if ($users[$_POST['login']] === $_POST['password']) { 
            echo 'Вход выполнен.';
        } else {
            if (count($_SESSION) === 0 && isset($_SESSION['time']) === false) {
                $_SESSION['counter'] = 1;
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['time'] = time();
                echo 'Вход не выполнен. Неверный логин/пароль.';
            };
            if ($_SESSION['login'] === $_POST['login'] && $_SESSION['time']) {
                if ((time() - $_SESSION['time']) < 60) {
                    $_SESSION['counter']++;
                    if ($_SESSION['counter'] > 3) {
                        echo 'Вход не выполнен. Неверный логин/пароль.<br>Слишком часто вводите пароль. Попробуйте еще раз через минуту.';
                        session_destroy(); 
                        $file = 'bruteForceFile.txt';
                        $newFile = fopen($file, 'a+');
                        $report ="Пользователь: ".$_SESSION['login'].' '."Дата: ".date('d.m.Y H:i:s')."\n";
                        fwrite($newFile, $report);
                        fclose($newFile);
                    } else {
                        echo 'Вход не выполнен. Неверный логин/пароль.';
                    };          
                };            
                if ((time() - $_SESSION['time']) < 5) {
                    echo '<br>Слишком быстро вводите пароль.';
                };
            } else {
                $_SESSION['counter'] = 1;
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['time'] = time();
                echo 'Вход не выполнен. Неверный логин/пароль.';
            };             
        };
    };