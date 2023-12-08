<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title='modfication';
include('header.php');

?>
<body>
    <div class="container mt-5">
    <?= isset($_SESSION['msg'])?$_SESSION['msg']:''?>
         <?php
        if (isset($_SESSION['msg'])) {
            unset($_SESSION['msg']);
        }
        ?>
        <h1 class="mb-4">Formulaire de modification d'article</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $Articles_by_id['0']['title'] ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label">Contenu :</label>
                <textarea id="body" name="body" class="form-control" required><?= $Articles_by_id['0']['body'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifier l'article</button>
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

    $title = cleanInput($_POST['title']);
    $body = cleanInput($_POST['body']);
    $id = $_GET['id'];

    if(!empty($title) && !empty($body) && !empty($id)) {


        $articles->updateArticle($id, $title, $body);
        $_SESSION['msg']="<div class='alert alert-success' role='alert'>
        Bravo ! Votre article $titre a etait mis à jour.
      </div>";
      header("Location: /articles/edit?id=$id");
      exit();

    } else {
        $_SESSION['msg']='<div class="alert alert-danger" role="alert">
        Veuillez remplir tous les champs du formulaire.
      </div>';
      header("Location: /articles/edit?id=$id");
      exit();
    }

} else {
    $_SESSION['msg']='<div class="alert alert-danger" role="alert">
    Les données du formulaire ne sont pas correctes.
  </div>';
  header("Location: /articles/edit?id=$id");
  exit();

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
