<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title='ajout';
include('header.php');

?>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Formulaire de création d'article</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            unset($_SERVER['msg']);
        }
        ?>
        <?= isset($_SESSION['msg'])?$_SESSION['msg']:''?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= isset($_SESSION['title'])?$_SESSION['title']:''?>" required>
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label">Contenu :</label>
                <textarea id="body" name="body" class="form-control" required><?= isset($_SESSION['body'])?$_SESSION['body']:''?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer l'article</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ojsk3rVHf9EXKwzqveq9dNrfdBslY3/ik1Ubs5uP2Pz67xOYYm1zq5qz2XWAIsJ" crossorigin="anonymous"></script>
</body>
</html>
<?php
$articles = new Articles();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Vérifier si les données POST existent
if(isset($_POST['title'], $_POST['body'])) {

    $titre = cleanInput($_POST['title']);
    $body = cleanInput($_POST['body']);

$_SESSION['title']=$titre;
$_SESSION['body']=$body;

    if(!empty($titre) && !empty($body)) {


        $articles->createArticle($titre, $body);
        $_SESSION['msg']='<div class="alert alert-success" role="alert">
        Article ajouté !
      </div>';

    } else {
        $_SESSION['msg']='<div class="alert alert-danger" role="alert">
        Veuillez remplir tous les champs du formulaire.
      </div>';
    }

} else {
    $_SESSION['msg']='<div class="alert alert-danger" role="alert">
    Les données du formulaire ne sont pas correctes.
  </div>';

}
}
// Fonction pour nettoyer les données
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
