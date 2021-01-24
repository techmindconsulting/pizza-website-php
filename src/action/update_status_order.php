<?php

require_once '../../boostrap.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location:../../profile.php');
    die;
}

updateOrderStatus($_POST['order_id'], $_POST['status']);

switch ($_POST['status']) {
    case PAYMENT_STATUS_CANCELLED:
        setFlash('status_order', 'La commande a bien été annulée', 'alert-success');
        break;
    case PAYMENT_STATUS_PAID:
        setFlash('status_order', 'La commande a bien été payé', 'alert-success');
        break;
}

header('Location:../../profile.php');