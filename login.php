<?php
	include 'header.php';
?>
	<div class="main-container">
		<div class="main wrapper clearfix">
			<article>
				<header>
					<h1>Login</h1>
						<p>
							<?php
								session_start();

								// connect to Database and check for username and password match
								$dbhost = "localhost";
								$dbname = "srepsdb";
								$dbuser = "root";
								$dbpass = "";

								try
								{
									$dbconn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

									// SQL looks for a buyer with both entered username and password
									$sql = "SELECT * FROM `users` WHERE `user_email` = :email AND `user_password` = :password";
									$q = $dbconn->prepare($sql);
									$q->execute(array(":email"=>$_POST['email'], ":password"=>$_POST['password']));

									$r = $q->fetch();
								}

								catch(PDOException $e)
								{
									echo $e->getMessage();
								}


								// if result returned only has one set success
								if(!empty($r))
								{
									echo "<h2 align='center'>Login successful! <br />";

									// admin
									$_SESSION['email'] = $_POST['email'];
									if ($_POST['email'] == "admin")
									{
										$_SESSION['admin'] = '1';
									}

									// Print a nice welcome message
									echo "Welcome to the system " . $_POST['email'] . "! <br>";
									echo "Redirecting now.....</h2>";
									$logged = 1;

									// redirect to next page
									header( "refresh:1;url=index.php" );
								}
								else
								{
									echo "Invalid login <br>";
									header( "refresh:4;url=index.php" );
									echo "Redirecting back.....";
									session_destroy();
								}
							?>
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
