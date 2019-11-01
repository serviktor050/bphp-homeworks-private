<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 3.2.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        include 'classes/Person.php';
        $new_person = new PERSON('Иван', 'Иванов', 'Иванович');
    ?>
<h2><span class="gender-<?php echo $new_person->getGender()?>"><?php echo $new_person->getGenderSymbol()?></span> <?php echo $new_person->getFio() ?></h2>
</body>
</html>