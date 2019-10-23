<h1>Создать пользователя</h1>
<form action='formActions/addUser.php' method='POST'>
    <label>
        <span>Имя:</span>
        <input type='text' name='name' style='margin-top: 30px; margin-left: 100px' required>
    </label><br>
    <label>
        <span>Пароль:</span>
        <input type='text' name='password' style='margin-top: 30px; margin-left: 80px' required>
    </label><br>
    <label>
        <span>Электронная почта:</span>
        <input type='email' name='email' style='margin-top: 30px' required>
    </label><br>
    <label>
        <span>Рейтинг:</span>
        <input type='text' name='rate' style='margin-top: 30px; margin-left: 75px' required>
    </label><br>
    <button style='margin-top: 30px'>Добавить нового пользователя</button>
</form>

<?php
    include 'autoload.php';
    include 'config/SystemConfig.php';
    
    $listOfUsers = new Users;
    $listOfUsers->newQuery()->getObjs();
?>