<?php
require 'function.php';
require 'mailer.php';

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
