<?php

require_once '../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../index.php');
    die;
}

$isValid =  isValidForm($_POST);
if ($isValid) {
    $hasSent = sendContactMail($_POST['firstname'], 
    $_POST['lastname'], 
    $_POST['email'], 
    $_POST['phone'], 
    $_POST['message']);

    if ($hasSent) {
        setFlash('contact', 'Votre email a bien été envoyé','alert alert-success');
        header('Location:../../index.php#contact');
        die;
    }
}

setFlash('contact', 'Un problème a eu lieu lors de l\'envoi d\'email, merci de contacter le support.','alert alert-error');
header('Location:../../index.php#contact');
die;
