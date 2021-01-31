<?php

function computeTotalOrder(array $cartItem) : float 
{
    return array_sum(array_column($cartItem, 'total'));
}

function getNbItemsQuantity(array $cartItem) : int
{
    return array_sum(array_column ($cartItem, 'quantity')); 
}

function getStatus($status)
{
    switch ($status) {
        case PAYMENT_STATUS_PENDING:
            return 'Commande en attente';
        case PAYMENT_STATUS_PAID:
            return 'Commande payé';
        case PAYMENT_STATUS_CANCELLED:
            return 'Commande annulé';
        default:
            return null;
    }
}