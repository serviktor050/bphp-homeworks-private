<?php
    $users = [
        'admin' => 'admin1234',
        'randomUser' => 'somePassword',
        'janitor' => 'nimbus2000'
    ];

    session_start();

    if (isset($_POST['login'])) {
        setcookie('login', $_POST['login']);
        setcookie('time', time());

        if ($users[$_POST['login']] === $_POST['password']) { 
            echo 'Вход выполнен.';
        } else {
            if (count($_SESSION) === 0) {
                $_SESSION['counter'] = 1;
            };
            if ($_COOKIE['login'] === $_POST['login'] && $_COOKIE['time']) {
                if ((time() - $_COOKIE['time']) < 60) {
                    $_SESSION['counter']++;
                    if ($_SESSION['counter'] > 3) {
                        echo 'Вход не выполнен. Неверный логин/пароль.<br>Слишком часто вводите пароль. Попробуйте еще раз через минуту.';
                        $_SESSION = [];
                         
                        $file = 'bruteForceFile.txt';
                        $newFile = fopen($file, 'a+');
                        $report ="Пользователь: ".$_COOKIE['login'].' '."Дата: ".date('d.m.Y H:i:s')."\n";
                        fwrite($newFile, $report);
                        fclose($newFile);
                    } else {
                        echo 'Вход не выполнен. Неверный логин/пароль.';
                    };            
                };            
                if ((time() - $_COOKIE['time']) < 5) {
                    echo '<br>Слишком быстро вводите пароль.';
                };
            } else {
                echo 'Вход не выполнен. Неверный логин/пароль.';
            };             
        };
    };