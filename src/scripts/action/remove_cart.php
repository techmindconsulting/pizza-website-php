<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    unset($_SESSION['cart_item'][$_GET['product_id']]);
} else {
    unset($_SESSION['cart_item']);
}

header('Location:../../../shopping_cart.php');
die;