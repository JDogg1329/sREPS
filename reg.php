<?php
    include 'header.php';
?>
<div class="main-container">
	<div class="main wrapper clearfix">

		<article>
			<header>
			<h1>Login</h1>

				<!-- Use session to display registered user email, name and current date-->
				<p>	Welcome <?php echo $_POST['name']; ?>!<br />
				<br>
					Email: <?php echo $_POST['email']; ?> <br>

				<p>	Timestamp <?php echo date('Y/m/d'); ?></p>

					<?php

                        $servername = 'localhost';
                        $username = 'root';
                        $password = '';
                        $dbname = 'srepsdb';

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                            die('Connection failed: '.mysqli_connect_error());
                        }

                        $sql = "INSERT INTO users (user_email, user_password, user_name)
							VALUES ('$_POST[email]','$_POST[password]','$_POST[name]')";

                        if (mysqli_query($conn, $sql)) {
                            echo 'New record created successfully';
                        } else {
                            echo 'Error: '.$sql.'<br>'.mysqli_error($conn);
                        }

                        mysqli_close($conn);
                    ?>
				<p><a href="log.php">Go back</a> and login</p>

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
