<?php
    $firstName = mb_convert_case($_POST['firstName'], MB_CASE_TITLE, "UTF-8");
    $lastName = mb_convert_case($_POST['lastName'], MB_CASE_TITLE, "UTF-8");
    $middleName = mb_convert_case($_POST['middleName'], MB_CASE_TITLE, "UTF-8");
    $fullName = ($firstName.' '.$middleName.' '.$lastName);
    echo("Полное имя: $fullName<br/>");
    
    $abbreviationFirstName = (mb_substr($firstName, 0, (-mb_strlen($firstName)+1)));
    $abbreviationLastName = (mb_substr($lastName, 0, (-mb_strlen($lastName)+1)));
    $abbreviationMiddleName = (mb_substr($middleName, 0, (-mb_strlen($middleName)+1)));
    $fio = ($abbreviationFirstName.$abbreviationLastName.$abbreviationMiddleName);
    echo("Аббревиатура: $fio<br/>");

    $surnameAndInitials = $lastName.' '.$abbreviationFirstName.'.'.$abbreviationMiddleName.'.';
    echo("Фамилия и инициалы: $surnameAndInitials");