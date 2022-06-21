<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Name</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Quantity</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Price</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Sum</th>
    </tr>
    </thead>
    <tbody>
    <? foreach($_SESSION['cart'] as $item): ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['title'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['quantity'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price'] * $item['quantity'] ?></td>
        </tr>
    <? endforeach;?>
    <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Total:</td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?=$_SESSION['cart.quantity'] ?></td>
    </tr>
    <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Sum:</td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . " {$_SESSION['cart.currency']['symbol_right']}" ?></td>
    </tr>
    </tbody>
</table>

</body>
</html>