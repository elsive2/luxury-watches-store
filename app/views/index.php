<!--banner-starts-->
<div class="bnr" id="home">
	<div id="top" class="callbacks_container">
		<ul class="rslides" id="slider4">
			<li>
				<img src="../../../public/images/bnr-1.jpg" alt="" />
			</li>
			<li>
				<img src="../../../public/images/bnr-2.jpg" alt="" />
			</li>
			<li>
				<img src="../../../public/images/bnr-3.jpg" alt="" />
			</li>
		</ul>
	</div>
	<div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--about-starts-->
<? if ($data['brands']) : ?>
	<div class="about">
		<div class="container">
			<div class="about-top grid-1">
				<? foreach ($data['brands'] as $brand) : ?>
					<div class="col-md-4 about-left">
						<figure class="effect-bubba">
							<img class="img-responsive" src="../../../public/images/<?= $brand->img ?>" alt="<?= $brand->title ?>" />
							<figcaption>
								<h2><?= $brand->title ?></h2>
								<p><?= $brand->description ?></p>
							</figcaption>
						</figure>
					</div>
				<? endforeach ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<? endif ?>
<!--about-end-->
<!--product-starts-->
<? if ($data['products']) : ?>
	<? $curr = \ishop\App::$app->getProperty('currency'); ?>
	<div class="product">
		<div class="container">
			<div class="product-top">
				<? $i = 1 ?>
				<? foreach ($data['products'] as $product) : ?>
					<? if ($i % 5 === 0) : ?>
						<div class="clearfix"></div>
			</div>
			<div class="product-one">
			<? endif ?>
			<? if ($i === 1) : ?>
				<div class="product-one">
				<? endif ?>

				<div class="col-md-3 product-left">
					<div class="product-main simpleCart_shelfItem">
						<a href="product?alias=<?= $product['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="../../../public/images/<?= $product['img'] ?>" alt="" /></a>
						<div class="product-bottom">
							<h3><a href="product?alias=<?= $product['alias'] ?>"><?= $product['title'] ?></a></h3>
							<p><a href="product?alias=<?= $product['alias'] ?>">Explore now</a></p>
							<h4><a class="add-to-cart-link" data-id="<?= $product['id'] ?>" href=""><i></i></a> <span class=" item_price"><?= $curr['symbol_left'] ?> <?= $product['price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></span></h4>
							<? if ($product['old_price'] != 0) : ?>
								<del><?= $curr['symbol_left'] ?> <?= $product['old_price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></del>
							<? else : ?>
								<br>
							<? endif ?>
						</div>
						<? if ($product['old_price'] != 0) : ?>
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
				<? $i++ ?>
			<? endforeach ?>
			<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
<? endif ?>

<!--product-end-->