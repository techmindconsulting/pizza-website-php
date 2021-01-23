<?php 
require_once '../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../login.php');
    die;
}
$newPassword = $_POST['new_password'];
$repeatPassword = $_POST['repeat_password'];
$email = $_POST['email']; //hidden field
$token = $_POST['token']; //hidden field

if ($newPassword !== $repeatPassword) {
    setFlash('login', 'Mot de passes sont différent, merci de resaisir votre nouveau mot de passe');
    header('Location: ../../reset_password.php');
    die;
}

$newPasswordHashed = hashPassword($newPassword);

$user = updateUser($email, ['password' => $newPasswordHashed]);
removeConfirmationToken($email);

setFlash('login', 'Mot de passe a bien été mise à jour.', 'alert alert-success');
header('Location:../../login.php');
die;