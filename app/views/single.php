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
<!--start-single-->
<div class="single contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-12 single-main-left">
				<div class="sngl-top">
					<? if ($data['gallery']) : ?>
						<div class="col-md-5 single-top-left">
							<div class="flexslider">
								<ul class="slides">
									<? foreach ($data['gallery'] as $image) : ?>
										<li data-thumb="../../public/images/<?= $image['img'] ?>">
											<div class="thumb-image"> <img src="../../public/images/<?= $image['img'] ?>" data-imagezoom="true" class="img-responsive" alt="" /> </div>
										</li>
									<? endforeach ?>
								</ul>
							</div>
						</div>
					<? else : ?>
						<div class="col-md-3 single-top-left">
							<img src="../../public/images/<?= $data['product']['img'] ?>" alt="">
						</div>
					<? endif ?>
					<?
					$curr = \ishop\App::$app->getProperty('currency');
					$cats = \ishop\App::$app->getProperty('cats');
					?>
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
							<h2><?= $data['product']['title'] ?></h2>
							<div class="star-on">
								<ul class="star-footer">
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
								</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>

								</div>
								<div class="clearfix"> </div>
							</div>

							<h5 class="item_price" id="base-price" data-price="<?= $data['product']['price'] * $curr['value'] ?>" data-leftsymb="<?= $curr['symbol_left'] ?>" data-rightsymb="<?= $curr['symbol_right'] ?>">
								<?= $curr['symbol_left'] ?> <?= $data['product']['price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?>
							</h5>
							<? if ($data['product']['old_price'] != 0) : ?>
								<del><?= $curr['symbol_left'] ?> <?= $data['product']['old_price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></del>
							<? endif ?>
							<p><?= $data['product']['content'] ?></p>
							<div class="available">
								<ul>
									<li>Color
										<select>
											<option>Default</option>
											<? foreach ($data['mods'] as $mod) : ?>
												<option data-price="<?= $mod['price'] * $curr['value'] ?>" value="<?= $mod['id'] ?>"><?= $mod['title'] ?></option>
											<? endforeach ?>
										</select>
									</li>
									<div class="clearfix"> </div>
								</ul>
							</div>
							<ul class="tag-men">
								<li><span>CATEGORY</span>
									<span>: <a href="products?category=<?= $cats[$data['product']['category_id']]['alias'] ?>"><?= $cats[$data['product']['category_id']]['title'] ?></a></span>
								</li>
							</ul>
							<div class="quantity mt-3">
								<p>count</p>
								<input type="number" value="1" name="quantity" min="1" step="1">
							</div>
							<a id="productAdd" data-id="<?= $data['product']['id'] ?>" href="" class="add-cart item_add add-to-cart-link">ADD TO CART</a>

						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="tabs">
					<ul class="menu_drop">
						<li class="item1"><a href="#"><img src="../../public/images/arrow.png" alt="">Description</a>
							<ul>
								<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item2"><a href="#"><img src="../../public/images/arrow.png" alt="">Additional information</a>
							<ul>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item3"><a href="#"><img src="../../public/images/arrow.png" alt="">Reviews (10)</a>
							<ul>
								<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item4"><a href="#"><img src="../../public/images/arrow.png" alt="">Helpful Links</a>
							<ul>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item5"><a href="#"><img src="../../public/images/arrow.png" alt="">Make A Gift</a>
							<ul>
								<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
							</ul>
						</li>
					</ul>
				</div>
				<? if ($data['related']) : ?>
					<div class="latestproducts">
						<div class="product-one">
							<h3>Also can be interesting</h3>
							<? foreach ($data['related'] as $related) : ?>
								<div class="col-md-4 product-left p-left">
									<div class="product-main simpleCart_shelfItem">
										<a href="product?alias=<?= $related['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="../../public/images/<?= $related['img'] ?>" alt="" /></a>
										<div class="product-bottom">
											<h3><a href="product?alias=<?= $related['alias'] ?>"></a><?= $related['title'] ?></h3>
											<p>Explore Now</p>
											<h4><a class="item_add add-to-cart-link" href="" data-id="<?= $related['id'] ?>"><i></i></a> <span class=" item_price"><?= $curr['symbol_left'] ?> <?= $related['price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></span></h4>
											<? if ($related['old_price'] != 0) : ?>
												<del><?= $curr['symbol_left'] ?> <?= $related['old_price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></del>
											<? endif ?>
										</div>
										<? if ($related['old_price'] != 0) : ?>
											<div class="srch">
												<span>-<?= round((($related['old_price'] - $related['price']) * 100) / ($related['price'] * $curr['value'])) ?>%</span>
											</div>
										<? endif ?>
									</div>
								</div>
							<? endforeach ?>
							<div class="clearfix"></div>
						</div>
					</div>
				<? endif ?>

				<? if ($data['recentlyWatched']) : ?>
					<div class="latestproducts">
						<div class="product-one">
							<h3>Recently watched products</h3>
							<? foreach ($data['recentlyWatched'] as $related) : ?>
								<div class="col-md-4 product-left p-left">
									<div class="product-main simpleCart_shelfItem">
										<a href="product?alias=<?= $related['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="../../public/images/<?= $related['img'] ?>" alt="" /></a>
										<div class="product-bottom">
											<h3><a href="product?alias=<?= $related['alias'] ?>"></a><?= $related['title'] ?></h3>
											<p>Explore Now</p>
											<h4><a class="item_add add-to-cart-link" href="" data-id="<?= $related['id'] ?>"><i></i></a> <span class=" item_price"><?= $curr['symbol_left'] ?> <?= $related['price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></span></h4>
											<? if ($related['old_price'] != 0) : ?>
												<del><?= $curr['symbol_left'] ?> <?= $related['old_price'] * $curr['value'] ?> <?= $curr['symbol_right'] ?></del>
											<? endif ?>
										</div>
										<? if ($related['old_price'] != 0) : ?>
											<div class="srch">
												<span>-<?= round((($related['old_price'] - $related['price']) * 100) / ($related['price'] * $curr['value'])) ?>%</span>
											</div>
										<? endif ?>
									</div>
								</div>
							<? endforeach ?>
							<div class="clearfix"></div>
						</div>
					</div>
                </div>
				<? endif ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--end-single-->