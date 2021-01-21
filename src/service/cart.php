<?php

function computeTotalOrder(array $cartItem) : float 
{
    return array_sum(array_column($cartItem, 'total'));
}

function getNbItemsQuantity(array $cartItem) : int
{
    return array_sum(array_column ($cartItem, 'quantity')); 
}