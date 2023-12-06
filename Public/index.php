<?php

// autoloader
require_once __DIR__ . '/../vendor/autoload.php';
// import
use Carbon\Carbon;
use Dotenv\Dotenv;

// charge le fichier .env a la racine

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// appel mon router

require_once('../src/Controller/root.php');

?>
