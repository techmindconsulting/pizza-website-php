<?php
ob_start();
$connexion = null;
$message = '';

if (MAINTENANCE_MODE) {
    header('Location:maintenance.php');
}

try {
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD);
   
    // Configure un attribut de base de données => PDO::ERRMODE_EXCEPTION : émet une exception.
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $exception) {
    $message = $exception->getMessage();
    sendNotification('Connexion Error', $message);
    header('Location:maintenance.php');
}