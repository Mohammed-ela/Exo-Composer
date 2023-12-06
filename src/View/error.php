<?php
$title = 'Erreur 404 - Page non trouvée';
include('../src/View/header.php');
?>

    <style>
        body {
            text-align: center;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        p {
            font-size: 1em;
            margin-top: 0;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>

<body>
    <h1>Erreur 404 - Page non trouvée</h1>
    <p>Désolé, la page que vous recherchez semble introuvable.</p>
    <a href="" class="btn btn-secondary mt-2">Retour à l'accueil</a>
</body>
</html>
