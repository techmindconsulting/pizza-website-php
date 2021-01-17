<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../../carte.php');
    die;
}

$isValid =  isValidForm($_POST);

if ($isValid) {
    $data = array_merge($_POST, $_SESSION);

    $userId = createUser($data);
    $data['cart_total'] = computeTotalOrder($data['cart_item']);
    $data['order_id'] = createOrder($userId, $data);
    createOrderItem($data);
    sendConfirmationOrder($data);

    unset($_SESSION['cart_item']);
        
    header('Location:../../../confirmation.php?confirm=ok&order_id='.$data['order_id']);
}
die;