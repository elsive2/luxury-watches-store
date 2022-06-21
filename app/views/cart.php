<? if (!empty($_SESSION['cart'])) : ?>
    <? if (isset($data['isOrderPage'])):?>
    <div class="container">
    <? endif ?>
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total price</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<? foreach ($_SESSION['cart'] as $id => $product) : ?>
					<tr>
						<td><a href="prdouct?alias=<?= $product['alias'] ?>"><img src="../../public/images/<?= $product['img'] ?>" alt=""></a></td>
						<td><a href="prdouct?alias=<?= $product['alias'] ?>"><?= $product['title'] ?></a></td>
						<td>x<?= $product['quantity'] ?></td>
						<td><?= $_SESSION['cart.currency']['symbol_left'] . $product['price'] . $_SESSION['cart.currency']['symbol_right'] ?></td>
						<td><?= $_SESSION['cart.currency']['symbol_left'] . (int)$product['quantity'] * (float)$product['price'] . $_SESSION['cart.currency']['symbol_right'] ?></td>
						<td><img src="../../public/images/cross.png" alt="" width="25" height="25" id="delete-product-cross" data-id="<?= $id ?>"></td>
					</tr>
				<? endforeach ?>
				<tr>
					<td>Total:</td>
					<td colspan="5" class="text-right cart-qty">x<?= $_SESSION['cart.quantity'] ?></td>
				</tr>
				<tr>
					<td>Total price:</td>
					<td colspan="5" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
    <form action="order/checkout" method="POST" class="mt-3 mb-5">
        <button type="submit" class="btn btn-success">Confirm your order</button>
    </form>
	<? if (isset($data['isOrderPage'])):?>
    </div>
    <? endif ?>
<? else : ?><h3>Your cart is empty!</h3><? endif ?>