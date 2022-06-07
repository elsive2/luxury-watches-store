<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Free 404 White for Iphone, Android & Smartphone Mobile Website Template | Home :: w3layouts</title>
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		.wrap {
			width: 1000px;
			margin: 0 auto;
		}

		.logo {
			width: 430px;
			position: absolute;
			top: 25%;
			left: 35%;
		}

		p a {
			color: #eee;
			font-size: 13px;
			padding: 5px;
			background: #FF3366;
			margin-left: 10px;
			text-decoration: none;
			-webkit-border-radius: .3em;
			-moz-border-radius: .3em;
			border-radius: .3em;
		}

		p a:hover {
			color: #fff;
		}

		.error__status {
			font-size: 3.5rem;
		}

		.error__no {
			font-size: 4rem;
		}

		.error__message {
			margin-top: -1.5rem;
			font-size: 3rem;
		}

		.center {
			text-align: center;
		}

		.raw {
			display: flex;
		}

		.raw__el {
			margin-left: 10px;
		}
	</style>
</head>

<body>
	<div class="wrap">
		<div class="logo">
			<div class="raw">
				<div class="raw__el">
					<h1 class="error__no"> <?= $errno ?>: </h1>
				</div>
				<div class="raw__el">
					<h2 class="error__status"> <?= $status ?> </h2>
				</div>
			</div>
			<div class="center">
				<p class="error__message"><?= $errMessage ?></p>
				<p><a href="<?= BASE_URI ?>">Go back to Home</a></p>
			</div>
		</div>
	</div>
</body>

</html>