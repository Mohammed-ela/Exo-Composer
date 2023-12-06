<?php

// Fonction pour charger une vue

function loadView($view)
{

    include('../View/' . $view . '.php');
}

function loadCont($controller)
{
    include('../Controller/' . $controller . '.php');
}


$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = trim($request_uri, '/');

// Routeur
switch ($request_uri) {
    case '':
        loadView('articles');
        break;

    case 'articles':
        loadView('articles');
        break;



    default:
        loadView('error');
        break;
}
?>
