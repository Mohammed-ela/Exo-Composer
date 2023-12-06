<?php

// Fonction pour charger une vue

function loadView($view)
{

    include('../src/View/' . $view . '.php');
}

// function loadCont($controller)
// {
//     include('../Controller/' . $controller . '.php');
// }


$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = trim($request_uri, '/');

// Routeur
switch ($request_uri) {
    // url name
    case '':
        // fichier
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
