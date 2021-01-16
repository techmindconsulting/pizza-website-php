<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../../boostrap.php';
require_once '../model/product.php';
require_once '../model/user.php';
require_once '../model/order.php';

$isValid =  isValidForm($_POST);

if ($isValid) {
    $data = array_merge($_POST, $_SESSION);

    $userId = createUser($data);
    $data['cart_total'] = computeTotalOrder($data['cart_item']);
    $orderId = createOrder($userId, $data);
    createOrderItem($orderId, $data);

    unset($_SESSION['cart_item']);
    
    header('Location:../../../confirmation.php?confirm=ok&order_id='.$orderId);
}
die;