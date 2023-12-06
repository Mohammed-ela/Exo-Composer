<?php
$title='articlebyid';
include('header.php');

?>
<body>

<div class="container mt-5">
    <h1><?= $Articles_by_id['0']['title'] ?></h1>

    <?php if (!empty($Articles_by_id)) : ?>
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
             
                    <tr>
                        <td><?= $Articles_by_id['0']['id'] ?></td>
                        <td><?= $Articles_by_id['0']['title'] ?></td>
                        <td><?= $Articles_by_id['0']['body'] ?></td>
                        <td><?= $Articles_by_id['0']['created_at'] ?></td>
                        <td><?= $Articles_by_id['0']['updated_at'] ?></td>
                    </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</div>


</body>
</html>