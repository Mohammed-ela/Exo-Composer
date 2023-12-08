<?php
$title = 'liste';
include('header.php');
?>
<body>

<div class="container mt-5">
    <h1>Liste des Articles</h1>
    <?= isset($_SESSION['msg'])?$_SESSION['msg']:''?>
         <?php
        if (isset($_SESSION['msg'])) {
            unset($_SESSION['msg']);
        }
        ?>
    <?php if (!empty($allArticles)) : ?>
        <table class="table table-bordered">
            <thead>
            <a href="create" class="btn btn-primary mb-2">Creer votre article</a>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Date de Création</th>
                    <th>Date de Mise à Jour</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allArticles as $article) : ?>
                    <tr>
                        <td><?= $article['id'] ?></td>
                        <td><?= $article['title'] ?></td>
                        <td><?= $article['body'] ?></td>
                        <td><?= $article['created_at'] ?></td>
                        <td><?= $article['updated_at'] ?></td>
                        <td>
                            <a href="/articles/delete?id=<?= $article['id'] ?>" class="btn btn-danger">Supprimer</a>
                            <a href="/articles?id=<?= $article['id'] ?>" class="btn btn-primary">Voir article</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</div>

</body>
</html>
