<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../../carte.php');
    die;
}

$hasValidForm =  isValidForm($_POST);
$hasValidEmail = hasValidEmail($_POST['email']);

if ($hasValidForm && $hasValidEmail) {
   $email = $_POST['email'];

   if(login($email,$_POST['password'])) {
       setFlash("login","Authentification OK", "alert-success");
       header('Location:../../../account.php');
       die;
   }
}

setFlash("login","Email ou mot de passe incorrect", "alert-error");
header('Location:../../../login.php');
die;