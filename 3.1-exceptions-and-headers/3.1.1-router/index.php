<?php
    /**
    * Доступные страницы на сайте
    *
    * @var array $availableLinks
    */
    $availableLinks = include './availableLinks.php';
    include 'classes/Router.php';
    include 'classes/BadRequest.php';
    include 'classes/NotFound.php';  
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    };

    $router = new Router($availableLinks);
    
    try {
        $router->isAvailablePage($page);
        echo "Вы находитесь на странице $page";
    } catch (BadRequest $e) {
        header('Location: error.php', 301);
    } catch (NotFound $e) {
        header('Location: 404.php', 404);
    }