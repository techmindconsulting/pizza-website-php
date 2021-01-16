<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../../boostrap.php';

if (!empty($_POST['quantity'])) {
    $product = getProduct($_POST['product_id']);  
    if (empty($_SESSION['cart_item'][$product['id']])) {
        $_SESSION['cart_item'][$product['id']]['quantity'] = (int)$_POST['quantity'];
        $_SESSION['cart_item'][$product['id']]['name'] = $product['name'];
        $_SESSION['cart_item'][$product['id']]['product_type_id'] = $product['product_type_id'];;
        $_SESSION['cart_item'][$product['id']]['price'] = (int)$product['price'];
    } else {
        if ($_GET['action'] === 'add') { 
            $_SESSION['cart_item'][$product['id']]['quantity'] +=  (int)$_POST['quantity'];
        } else {
            $_SESSION['cart_item'][$product['id']]['quantity'] =  (int)$_POST['quantity'];
        }
    }

    $_SESSION['cart_item'][$product['id']]['total'] =  $_SESSION['cart_item'][$product['id']]['quantity'] *  $_SESSION['cart_item'][$product['id']]['price'];
}

if ($_GET['action'] !== 'update') {
    header('Location:../../../carte.php?product-type-id='. $product['product_type_id']);
} else {
    header('Location:../../../shopping_cart.php');
}
die;
