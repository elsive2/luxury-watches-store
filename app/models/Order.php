<?php


namespace app\models;


use RedBeanPHP\R as R;

class Order extends AppModel
{
    public function saveOrder($userId, $currencyCode)
    {
        $order = R::dispense('order');
        $order->user_id = $userId;
        $order->currency = $currencyCode;
        $orderId = R::store($order);
        $this->saveOrderProduct($orderId);
        return $orderId;
    }

    public function saveOrderProduct($orderId)
    {

    }

    public function mailOrder($orderId, $userEmail)
    {

    }
}