<link rel="stylesheet" type="text/css" href="style.css"> <!-- Link to external CSS file -->


<?php
    include 'header.php';
?>
	<div class="main-container">
		<div class="main wrapper clearfix">
			<article>
				<header>

                                        <?php
                                                echo '<h2>Logging out.....<h2>'; // Display a message
                                                session_start(); // Session must be started before it is destoyed
                                                session_destroy(); // Destroy the session

                                                header('refresh:1;url=index.php'); // Redirect back to index after 1 second
                                        ?>

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
