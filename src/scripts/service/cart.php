<?php

function computeTotalOrder(array $cartItem) : float 
{
    return array_sum(array_column($cartItem, 'total'));
}