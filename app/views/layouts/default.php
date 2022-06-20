<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<?= $this->getMeta() ?>
	<link href="../../../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../public/css/style.css?v=<?= time() ?>" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../../public/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<select id="currencies" tabindex="4" class="dropdown drop">
								<? app\widgets\currency\Currency::run() ?>
							</select>
						</div>
						<div class="btn-group">
							<a class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<? if (isset($_SESSION['user'])) : ?>
									<li><a href="#">Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></a></li>
									<li><a href="/logout">Log out</a></li>
								<? else : ?>
									<li><a href="/login">Log in</a></li>
									<li><a href="/signup">Sign up</a></li>
								<? endif ?>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="cart" onclick="getCart(); return false;">
							<div class="total">
								<img src="../../../public/images/cart-1.png" alt="" />
								<? if (!empty($_SESSION['cart'])) : ?>
									<span class="simpleCart_total"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'] ?></span>
								<? else : ?>
									<span class="simpleCart_total">Empty cart</span>
								<? endif ?>
							</div>
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="/">
			<h1>Luxury Watches</h1>
		</a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
					<div class="top-nav">
						<ul class="memenu skyblue">
							<li class="active">
								<a href="/">Home</a>
							</li>
							<li>
								<a href="/products">Products</a>
							</li>
							<? foreach (app\widgets\menu\Menu::run() as $element) : ?>
								<li class="grid">
									<a href="products?category=<?= $element['alias'] ?>"><?= $element['title'] ?></a>
									<? if (!empty($element['childs'])) : ?>
										<div class="mepanel">
											<div class="row">
												<div class="cl1 me-one">
													<ul>
														<? foreach ($element['childs'] as $child) : ?>
															<li>
																<a href="products?category=<?= $child['alias'] ?>"><?= $child['title'] ?></a>
															</li>
														<? endforeach ?>
													</ul>
												</div>
											</div>
										</div>
									<? endif ?>
								</li>
							<? endforeach ?>
						</ul>
					</div>
					<div class="clearfix"> </div>

				</div>
			</div>
			<div class="col-md-3 header-right">
				<div class="search-bar">
					<form action="search" method="GET" autocomplete="off">
						<input type="text" class="typeahead" id="typeahead" name="q" placeholder="Search">
						<input type="submit" value="">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!--bottom-header-->

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<? if (isset($_SESSION['errors'])) : ?>
						<div class="alert alert-danger">
							<?= $_SESSION['errors'];
							unset($_SESSION['errors']) ?>
						</div>
					<? endif ?>
					<? if (isset($_SESSION['success'])) : ?>
						<?= $_SESSION['success'];
						unset($_SESSION['success']) ?>
					<? endif ?>
				</div>
			</div>
		</div>
	</div>

	<?= $content ?>

	<!--information-starts-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span>
								<h6>Facebook</h6>
							</a></li>
						<li><a href="#"><span class="twit"></span>
								<h6>Twitter</h6>
							</a></li>
						<li><a href="#"><span class="google"></span>
								<h6>Google+</h6>
							</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#">
								<p>Specials</p>
							</a></li>
						<li><a href="#">
								<p>New Products</p>
							</a></li>
						<li><a href="#">
								<p>Our Stores</p>
							</a></li>
						<li><a href="contact.html">
								<p>Contact Us</p>
							</a></li>
						<li><a href="#">
								<p>Top Sellers</p>
							</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html">
								<p>My Account</p>
							</a></li>
						<li><a href="#">
								<p>My Credit slips</p>
							</a></li>
						<li><a href="#">
								<p>My Merchandise returns</p>
							</a></li>
						<li><a href="#">
								<p>My Personal info</p>
							</a></li>
						<li><a href="#">
								<p>My Addresses</p>
							</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.
					</h4>
					<h5>+955 123 4567</h5>
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">
					<p>© 2015 Luxury Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->

	<div class="modal fade" id="cart" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Cart</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Сontinue shopping</button>
					<a href="/cart" type="button" class="btn btn-primary" id="make-order-btn">Make on order</a>
					<button type="button" class="btn btn-danger" id="clear-cart-btn">Clear the cart</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../public/js/memenu.js"></script>
	<script>
		$(document).ready(function() {
			$(".memenu").memenu();
		});
	</script>
	<!--dropdown-->
	<script src="../../../public/js/jquery.easydropdown.js"></script>
	<script src="../../../public/js/responsiveslides.min.js"></script>
	<script src="../../../public/app.js?v=<?= time() ?>"></script>
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<?= $scripts ?>
</body>

</html>