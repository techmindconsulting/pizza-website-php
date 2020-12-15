<?php
ob_start();
$connexion = null;
$message = '';

if (MAINTENANCE_MODE) {
    header('Location:maintenance.php');
}

try {
    $statusCode = 200;
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, 
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    
    // Configure un attribut de base de données => PDO::ERRMODE_EXCEPTION : émet une exception.
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $exception) {
    $message = $exception->getMessage();
    header('Location:maintenance.php');
}

/**
 * hasDBConnection
 *
 * @return mixed
 */
function hasDBConnection()
{
    global $connexion;
    if ($connexion !== null) {
        return $connexion->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    } else {
        return false;
    }
}
