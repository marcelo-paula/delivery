<?php

define('BASE_URL','http://localhost:8080/delivery/');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'app/controller/userController.php';

$users = new userController();

switch ($url) {
    //Pagina principal
    case '/delivery/':
        echo 'Principal';
    break;

    //Pagina de login
    case '/delivery/users':
        $users->login();
    break;

    //Registro de usuários
    case '/delivery/registerUsers':
        echo 'Registro de usuários';
    break;
    
    default:
        echo 'Página não existe';
    break;
}