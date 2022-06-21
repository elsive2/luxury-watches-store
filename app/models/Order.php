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
        $sqlPart = '';
        foreach ($_SESSION['cart'] as $productId => $product) {
            $productId = (int)$productId;
            $sqlPart .= "($orderId, $productId, {$product['quantity']}, '{$product['title']}', {$product['price']}),";
        }
        $sqlPart = rtrim($sqlPart, ',');
        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sqlPart");
    }

    public function mailOrder($orderId, $userEmail)
    {

    }
}