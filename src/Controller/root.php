<?php
require_once('../src/Model/Articles.php');
$articles = new Articles();
function loadView($view, $data = array())
{
    extract($data);
    include('../src/View/' . $view . '.php');
}


$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = trim($request_uri, '/');

// Routeur
switch ($request_uri) {
    case 'articles':
        $id=$_GET['id'];
        if (empty($id)) {

        // Appel à la fonction depuis la classe
        $allArticles = $articles->getAllArticles();
        // on passe a notre fonction le name du fichier + la données en array
        loadView('Show_all_articles', array('allArticles' => $allArticles));
        break;
       
    }else {
        // Appel à la fonction depuis la classe
        $Articles_by_id = $articles->getArticleById($id);
        // on passe a notre fonction le name du fichier + la données en array
        loadView('Show_articles_by_id', array('Articles_by_id' => $Articles_by_id));
        break;
    }
        
    case 'articles/create':
        postCreate();
        break;

    case 'articles/store':
        postStore();
        break;

    case 'articles/edit':
        postEdit();
        break;

    case 'articles/update':
        postUpdate();
        break;

    case 'articles/destroy':
        postDestroy();
        break;

    default:
        loadView('error');
        break;
}
?>
