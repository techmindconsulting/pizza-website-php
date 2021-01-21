<?php

require_once '../../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../../index.php');
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
        header('Location:../../index.php?sent=ok#contact');
        die;
    }
}

header('Location:../../index.php?sent=ko#contact');
die;
