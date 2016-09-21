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
						<label for="email">Email: </label> <input type="email" id="email" class="input" name="email" required /><br>
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

</body>
</html>
