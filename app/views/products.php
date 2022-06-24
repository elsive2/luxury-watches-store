<!--start-breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<div class="breadcrumbs-main">
			<ol class="breadcrumb">
				<?= $data['breadcrumbs'] ?>
			</ol>
		</div>
	</div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
	<div class="container">
		<div class="prdt-top">
			<div class="col-md-12 prdt-left">
				<? if (!empty($data['products'])) : ?>
					<div class="product-one">
						<? $curr = \ishop\App::$app->getProperty('currency') ?>
						<? foreach ($data['products'] as $product) : ?>
							<div class="col-md-4 product-left p-left">
								<div class="product-main simpleCart_shelfItem">
									<a href="product?alias=<?= $product['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="../../public/images/<?= $product['img'] ?>" alt="" /></a>
									<div class="product-bottom">
										<h3><?= $product['title']; ?></h3>
										<p>Explore Now</p>
										<h4>
											<a data-id="<?= $product['id']; ?>" class="add-to-cart-link" href="cart/add?id=<?= $product['id']; ?>"><i></i></a> <span class=" item_price"><?= $curr['symbol_left']; ?><?= $product['price'] * $curr['value']; ?><?= $curr['symbol_right']; ?></span>
											<? if ($product['old_price']) : ?>
												<small><del><?= $curr['symbol_left']; ?><?= $product['old_price'] * $curr['value']; ?><?= $curr['symbol_right']; ?></del></small>
											<? endif; ?>
										</h4>
									</div>
									<div class="srch srch1">
                                        <? if ($product['old_price']): ?>
                                            <div class="srch">
                                                <?
                                                $oldPrice = $product['old_price'] * $curr['value'];
                                                $price = $product['price'] * $curr['value'];
                                                ?>
                                                <span><?= (($price - $oldPrice) / $oldPrice) * 100 ?>%</span>
                                            </div>
                                        <? endif ?>
									</div>
								</div>
							</div>
						<? endforeach; ?>
						<div class="clearfix"></div>
						<div class="text-center">
							<? if ($data['pagination']->countPages > 1) : ?>
								<?= $data['pagination'] ?>
							<? endif ?>
						</div>
					</div>
				<? endif; ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--product-end-->