<?php

session_start();

define('BASE_URL','http://localhost:8080/delivery/');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = (explode('?', $url))[0]; //tudo que for ponto de interrogação é ignorado na url (ex: ?id=1)

include 'app/model/db.php';
include 'app/controller/userController.php';
include 'app/model/userModel.php';
include 'app/helper/security.php';
include 'app/controller/countryController.php';
include 'app/model/countryModel.php';
include 'app/controller/stateController.php';
include 'app/model/stateModel.php';

$users = new userController();
$security = new Security();
$country = new countryController();
$state = new stateController();

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
        $security->verificationLogin();
        $users->register();
    break;

    //cadastrar usuario no banco de dados
    case '/delivery/registerUsers/register':
        $users->createUser();
    break;

    //vai fzer login com o usuario
    case '/delivery/users/login':
        $security->verificationLogin();
        $users->loginUser();
    break;

    //página de paises
    case '/delivery/country':
        // $security->verificationLogin();
        $country->viewCountry();
    break;

    //registrar país no banco de dados
    case '/delivery/country/register':
        $country->create();
    break;

    //pagina de estado
    case '/delivery/state':
        // $security->verificationLogin();
        $state->viewState();
    break;

    //registrar estado no banco de dados
    case '/delivery/state/register':
        $state->create();    
    break;

    //pagina de cidade
    case '/delivery/city':
        // $security->verificationLogin();
    break;
    
    default:
        echo 'Página não existe';
    break;
}