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
        $cfg = require_once CONFIG . '/mail.php';

        $transport = (new \Swift_SmtpTransport($cfg['mail_host'], $cfg['mail_port']))
            ->setUsername($cfg['mail_username'])
            ->setPassword($cfg['mail_password']);
        $mailer = new \Swift_Mailer($transport);

        ob_start();
        require APP . '/mails/mail_order.php';
        $body = ob_get_clean();

        $message = (new \Swift_Message('Order №'.$orderId))
            ->setFrom($userEmail)
            ->setTo('maximyakovlev228@gmail.com')
            ->setBody($body, 'text/html');

        $mailer->send($message);
    }
}