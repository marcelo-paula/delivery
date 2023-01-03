<?php

define('BASE_URL','http://localhost:8080/delivery/');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'app/model/db.php';
include 'app/controller/userController.php';
include 'app/model/userModel.php';

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
        $users->register();
    break;

    //cadastrar usuario no banco de dados
    case '/delivery/registerUsers/register':
        $users->createUser();
    break;

    //vai fzer login com o usuario
    case '/delivery/users/login':
        $users->loginUser();
    break;
    
    default:
        echo 'Página não existe';
    break;
}