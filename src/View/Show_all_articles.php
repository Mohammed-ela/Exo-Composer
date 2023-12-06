<?php
$title='liste';
include('header.php');
?>
<body>

<div class="container mt-5">
    <h1>Liste des Articles</h1>

    <?php if (!empty($allArticles)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Date de Création</th>
                    <th>Date de Mise à Jour</th>
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