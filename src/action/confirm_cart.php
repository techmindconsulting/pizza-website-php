<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../carte.php');
    die;
}

$isValid =  isValidForm($_POST);

if ($isValid) {
    if (!isset($_SESSION['auth']['logged'])) {
        $data = array_merge($_POST, $_SESSION);
        $data['password'] = hashPassword($data['password']);
        $userId = createUser($data);
    } else {
        $user = getUserBy('email', $_POST['email']);
        $data = array_merge($user, $_SESSION);
        $userId = $user['id'];
    }
  
    $data['cart_total'] = computeTotalOrder($data['cart_item']);
    $data['order_id'] = createOrder($userId, $data);
    
    createOrderItem($data);
    sendConfirmationOrder($data);

    unset($_SESSION['cart_item']);

    $message = "<i class='fas fa-hamburger'></i> Voici votre numéro de commande ". $data['order_id'];
    setFlash('confirm-cart',$message,'alert-success');
        
    header('Location:../../confirmation.php?confirm=ok&order_id='.$data['order_id']);
} else {
    $message = "Un problème a eu lieu lors de la commande, merci de contacter le support";
    setFlash('confirm-cart', $message, 'alert-error');

    header('Location:../../carte.php');
}
die;