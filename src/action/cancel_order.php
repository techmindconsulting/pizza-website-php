<?php

require_once '../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../profile.php');
    die;
}

if (!hasValidToken('cancel_order_'.$_POST['order_id'])) {
    setFlash('csrf_token', 'Jeton CSRF non valide ou manquant', 'alert-error');
}

updateOrderStatus($_POST['order_id'], 'PAYMENT_STATUS_CANCELLED');
setFlash('cancel_order', 'La commande a bien été annulée', 'alert-success');
header('Location:../../profile.php');