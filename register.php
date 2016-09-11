<?php
    include 'header.php';
?>
<div class="main-container">
	<div class="main wrapper clearfix">

		<article>
			<header>
			<h1>Register</h1>
				<p>
					<div id="contact-form">
						<form action="reg.php" method="post">
							<label for="email">Email: </label> <input type="text" id="email" class="input" name="email" required /><br>
							<label for="password">Password: </label> <input type="password" id="password" class="input" name="password" required /><br>
							<label for="name">Name: </label> <input type="text" id="name" class="input" name="name" required /><br>
							<label>&nbsp; </label> <input type="submit" value="Submit" class="button" />
							<input type="reset" value="Cancel" class="button" />
						</form>
					</div>
				</p>

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
