# Blog MVC avec Composer

## Objectif

Créer un blog MVC avec Composer.

## Interface

- Créez une page d'accueil GET /
- Utilisez le framework de votre choix pour créer une interface
- Affichez des notifications d'actions, telles que la création, la suppression et la modification d'un article
- Affichez des notifications en cas d'erreurs (voir la liste des cas d'erreurs plus bas)

## Base de données

- Créez une table `posts` avec les champs suivants :
  - `id` (int) : Identifiant unique de l'utilisateur, généré automatiquement lors de l'insertion
  - `created_at` (timestamp) : Date et heure de création de l'article, générées automatiquement lors de l'insertion
  - `updated_at` (timestamp) : Date et heure de mise à jour de l'article, générées automatiquement lors de la mise à jour
  - `title` (varchar(255)) : Titre de l'article
  - `body` (text) : Contenu de l'article

## Routes des articles

| Methode | URL               | Action           | Description                                   |
|---------|-------------------|-------------------|-----------------------------------------------|
| GET     | /articles         | postIndex()      | Affichage de tous les articles                |
| GET     | /articles/{id}    | postShow($id)     | Affichage d'un article (où {id} est l'id de l'article) |
| GET     | /articles/create  | postCreate()     | Affichage du formulaire de création d'un article |
| POST    | /articles         | postStore()      | Création d'un article                         |
| GET     | /articles/{id}/edit | postEdit($id)   | Affichage du formulaire de modification d'un article |
| POST    | /articles/{id}    | postUpdate($post) | Modification d'un article (où {id} est l'id de l'article) |
| POST    | /articles/{id}    | postDestroy($id)  | Suppression d'un article (où {id} est l'id de l'article) |

## Cas d'erreurs

### Affichage d'un article

- Vérifiez que le paramètre de requête {id} existe et soit un entier, sinon renvoyez une erreur 400
- Vérifiez que l'article correspondant au paramètre de requête {id} existe, sinon renvoyez une erreur 404

### Création d'un article

- Vérifiez que les champs title et body existent et soient remplis, sinon renvoyez l'utilisateur sur le formulaire de création en conservant les informations qu'il a saisies et en affichant un message d'erreur

### Modification d'un article

- Vérifiez que le paramètre de requête {id} existe et soit un entier, sinon renvoyez une erreur 400
- Vérifiez que l'{id} passé en paramètre correspond bien à un article, sinon renvoyez une erreur 404
- Vérifiez que les champs title et body existent et soient remplis, sinon renvoyez l'utilisateur sur le formulaire de modification en conservant les informations qu'il a saisies et en affichant un message d'erreur

### Suppression d'un article

- Vérifiez que le paramètre de requête {id} existe et soit un entier, sinon renvoyez une erreur 400
- Vérifiez que l'{id} passé en paramètre correspond bien à un article, sinon renvoyez une erreur 404

## Contraintes

- L'affichage d'un article doit afficher toutes les dates au format relatif ("Il y a 3 jours") en utilisant Carbon. Les dates sur les autres pages doivent être affichées au format français
- Les données des articles doivent se trouver dans une base de données MySQL dont les paramètres de connexion sont stockés dans un fichier .env grâce à PHP Dotenv
- Utilisez un système de confirmation d'action (notification) et de "old input" basé sur les messages de session flash
- L'écriture des articles utilise le format Markdown grâce à Parsedown
- Utilisez le package Respect/Validation pour la validation de vos formulaires
