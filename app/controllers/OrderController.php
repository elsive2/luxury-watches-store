<?php


namespace app\controllers;


use app\models\Order;

class OrderController extends Controller
{
    public function makeAnOrder()
    {
        $this->getView('cart', ['isOrderPage' => true]);
    }

    public function checkout()
    {
        $orderModel = new Order();

        $user = $_SESSION['user'];

        $orderId = $orderModel->saveOrder($user['id'], $_COOKIE['currency']);
        $orderModel->mailOrder($orderId, $user['email']);
    }
}