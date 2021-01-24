<?php

require_once '../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../carte.php');
    die;
}

$hasValidForm =  isValidForm($_POST);
$email = $_POST['email'];
$hasValidEmail = hasValidEmail($email);

if (false !== getUserBy('email', $email)) {
    $token = bin2hex(random_bytes(50));
    $user = updateUser($email, ['confirmation_token' => $token]);

    sendResetPasswordLink($user);
    setFlash('login', 'Un lien vous a été envoyé', 'alert alert-success');
    header('Location: ../../forgot_password.php');
    die;
} 

setFlash('login', 'L\'utilisateur n\'existe pas', 'alert alert-error');
header('Location: ../../forgot_password.php');
die;