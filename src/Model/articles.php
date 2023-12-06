<?php

class Articles
{

// Function to establish a database connection
public static function connectDB()
{
    $host = $_ENV['DB_HOST']; 
    $dbname = $_ENV['DB_NAME'];
    $username = $_ENV['DB_USER']; 
    $password = ""; 

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

// Function to get all articles
public static function getAllArticles()
{
    $db = self::connectDB();
    $query = "SELECT * FROM articles";
    $result = $db->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get an article by ID
function getArticleById($id)
{
    $db = self::connectDB();
    $query = "SELECT * FROM articles WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to create a new article
function createArticle($title, $body)
{
    $db = self::connectDB();
    $query = "INSERT INTO articles (title, body) VALUES (:title, :body)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":body", $body);
    $stmt->execute();
}

// Function to update an article by ID
function updateArticle($id, $title, $body)
{
    $db = self::connectDB();
    $query = "UPDATE articles SET title = :title, body = :body, updated_at = NOW() WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":body", $body);
    $stmt->execute();
}

// Function to delete an article by ID
function deleteArticle($id)
{
    $db = self::connectDB();
    $query = "DELETE FROM articles WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

}
?>
