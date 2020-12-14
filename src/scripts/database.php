<?php
ob_start();
$connexion = null;
$message = '';
try {
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, 
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    
    // Configure un attribut de base de données => PDO::ERRMODE_EXCEPTION : émet une exception.
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(Exception $exception) {
    $message = $exception->getMessage();
    header('Location: maintenance.php');
    ob_end_clean();
    die;
}
