<?php

function getOrderByUser($userId)
{
    $orders = getOrders($userId);
    $statOrder['list'] = $orders;
    $statOrder['total'] = count($orders);
    $statOrder['status'] = array_count_values(array_column($orders, 'status'));    

    return $statOrder;
}