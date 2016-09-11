<?php
include 'header.php';
?>
<div class="main-container">
	<div class="main wrapper clearfix">

		<article>
			<header>
				<h1>Login</h1>
				<div id="contact-form">
				<p>
					<form method="post" action="login.php">
						<label for="email">Email: </label> <input type="text" id="email" class="input" name="email" required /><br>
						<label for="password">Password: </label> <input type="password" id="password" class="input" name="password" required /><br>
						<label>&nbsp; </label> <input type="submit" value="Log In" class="button" />
						<input type="reset" value="Cancel" class="button" />
					</form>
				</p>
				</div>
			</header>
		</article>


	</div> <!-- #main -->
</div> <!-- #main-container -->


<?php
	include 'footer.php';
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	e.src='//www.google-analytics.com/analytics.js';
	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
