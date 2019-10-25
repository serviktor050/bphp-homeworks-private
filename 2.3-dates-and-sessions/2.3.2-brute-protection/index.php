<?php
    $users = [
        'admin' => 'admin1234',
        'randomUser' => 'somePassword',
        'janitor' => 'nimbus2000'
    ];

    function login($users) {
        if ($users[$_POST['login']] === $_POST['password']) { 
            echo 'Вход выполнен.';
            return true;
        } else {
            echo 'Неверный логин/пароль.';
            return false;
        };
    };

    $loginUser = login($users);

    if ($loginUser === false) {
        session_start();
        $_SESSION['counter'];
        
        setcookie('login', $_POST['login']);
        setcookie('time', time());

        if ($_COOKIE['login'] === $_POST['login'] && $_COOKIE['time']) {
            if ((time() - $_COOKIE['time']) < 60) {
                $_SESSION['counter']++;
                if ($_SESSION['counter'] > 2) {
                    echo '<br>Слишком часто вводите пароль. Попробуйте еще раз через минуту.';
                    $_SESSION['counter'] = 0;
                     
                    $file = 'bruteForceFile.txt';
                    $newFile = fopen($file, 'a+');
                    $report ="Пользователь: ".$_COOKIE['login'].' '."Дата: ".date('d.m.Y H:i:s')."\n";
                    fwrite($newFile, $report);
                    fclose($newFile);
                };            
            };            
            if ((time() - $_COOKIE['time']) < 5) {
                echo '<br>Слишком часто вводите пароль.';
            };
        };
    };