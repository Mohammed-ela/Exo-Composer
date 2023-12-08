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

        if (empty($_GET['id'])) {

        // Appel à la fonction depuis la classe
        $allArticles = $articles->getAllArticles();
        // on passe a notre fonction le name du fichier + la données en array
        loadView('Show_all_articles', array('allArticles' => $allArticles));
        break;
       
    }else {
        $id=$_GET['id'];
        // Appel à la fonction depuis la classe
        $Articles_by_id = $articles->getArticleById($id);
        // on passe a notre fonction le name du fichier + la données en array
        loadView('Show_articles_by_id', array('Articles_by_id' => $Articles_by_id));
        break;
    }
        
    case 'articles/create':
        // $createArticles = $articles->createArticle();
        loadView('create_articles',array());
        break;

    case 'articles/edit':
        if (!empty($_GET['id'])) {

            $id=$_GET['id'];
            $Articles_by_id = $articles->getArticleById($id);
            loadView('update_articles', array('Articles_by_id' => $Articles_by_id));
            break;

        }else{
            loadView('error');
            break;
        }
    
    
     case 'articles/delete':
    
        if (!empty($_GET['id'])) {

            $id=$_GET['id'];

            $articles = new Articles();

            $articles->deleteArticle($id);
            $_SESSION['msg']="<div class='alert alert-success' role='alert'>
            Votre article a bien etait supprimé !
            </div>";
            // Appel à la fonction depuis la classe
            $allArticles = $articles->getAllArticles();
            // on passe a notre fonction le name du fichier + la données en array
            loadView('Show_all_articles', array('allArticles' => $allArticles));
            break;
            
        }else{
            loadView('error');
            break;
        }








    default:
        loadView('error');
        break;
}
?>
