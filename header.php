<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
<div class="page-wrap">
	<!--[if lt IE 7]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

<div class="header-container">
	<header class="wrapper clearfix">
		<h1 class="title">sREPS</h1>
		<nav>
			<ul>
				<?php if (!isset($_SESSION['email'])) echo "<li><a href='register.php'>Register</a></li>"; ?>
				<?php if (!isset($_SESSION['email'])) echo "<li><a href='log.php'>Login</a></li>"; ?>
				<?php if (isset($_SESSION['email'])) echo "<li><a href='logout.php'>Logout</a></li>"; ?>
				<?php if (isset($_SESSION['email'])) echo "<li><a href='sales.php'>Sales</a></li>" ?>
				<?php if (isset($_SESSION['email'])) echo "<li><a href='items.php'>Items</a></li>" ?>

				<!--<li><a href="#">nav ul li a</a></li>-->
			</ul>
		</nav>
	</header>
</div>