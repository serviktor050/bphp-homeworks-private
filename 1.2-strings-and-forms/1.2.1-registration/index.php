<?php
    $codeWord = 'nd82jaake';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];
    
    if (preg_match('/[(@\/*?,;:)]/', $login) === 1) {
        echo ('Логин не должен содержать символы: "()@\/*?,;:".');
    } elseif (preg_match('/[^ 0-9]/', $firstName) != 1) {
        echo ('Поле "Имя" не может быть пустым.');
    } elseif (preg_match('/[^ 0-9]/', $lastName) != 1) {
        echo ('Поле "Фамилия" не может быть пустым.');
    } elseif (preg_match('/[^ 0-9]/', $middleName) != 1) {
        echo ('Поле "Отчество" не может быть пустым.');
    } elseif (strlen($password) < 8) {
        echo ('Пароль не должен быть короче 8 символов.');
    } elseif (preg_match('/[a-zA-Z0-9@.]/', $email) !=1  ) {
        echo ('Пожалуйста, проверьте написание адреса электронной почты.');
    } else {
        echo ('Регистрация прошла успешно!');
    };