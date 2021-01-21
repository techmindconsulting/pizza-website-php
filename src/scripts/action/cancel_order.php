<?php

require_once '../../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../../account.php');
    die;
}

if (!hasValidToken('cancel_order_'.$_POST['order_id'])) {
    setFlash('csrf_token', 'Jeton CSRF non valide ou manquant', 'alert-error');
}

updateOrderStatus($_POST['order_id'], 'PAYMENT_STATUS_CANCELLED');

header('Location:../../../account.php');