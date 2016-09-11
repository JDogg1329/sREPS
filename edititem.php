<?php
session_start();
include 'header.php';

?>
<div class="main-container">
	<div class="main wrapper clearfix">
		<article>
			<header>
			<h1>Edit Item</h1>

			<?php
                $host = 'localhost';
                $user = 'root'; // your user name
                $pwd = ''; // your password
                $sql_db = 'srepsdb'; // your database

                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

                $itemid = trim($_POST['item_id']);

                if (!$conn) {
                    // Displays an error message
                    echo '<p>Database connection failure</p>'; // not in production script
                } else {
                    $query = "SELECT * FROM item where item_id = '$itemid'";

                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        echo '<p class="wrong">Something is wrong with ', $query, '</p>';
                    } else {
                        //header('Location:items.php');

                        //seperate result into different variable
                        while ($row = mysqli_fetch_assoc($result)) {
                            $itemid = $row['item_id'];
                            $itemname = $row['item_name'];
                            $itemcategory = $row['item_category'];
                            $itemquantity = $row['item_quantity'];
                            $itemprice = $row['item_price'];
                        } ?>
					<!-- Put result into text box and allow user to change the value -->
					<div id="contact-form">
						<h1>Edit an Item</h1>

						<form action="edititeminsert.php" method="post">
							<label>Name: <input type="text" name="item_name" size="20" value="<?php echo $itemname ?>"></label>

							<br>

							<label>Category: <input type="text" name="item_category" size="20" value="<?php echo $itemcategory ?>"></label>

							<br>

							<label>Quantity: <input type="text" name="item_quantity" size="20" value="<?php echo $itemquantity ?>"></label>

							<br>

							<label>Price: <input type="text" name="item_price" size="20" value="<?php echo $itemprice ?>"></label>
							<input type="hidden" name="item_id" value="<?php echo $itemid ?>">

							<br><br>

							<label>&nbsp; </label> <input type="submit" value="Submit" class="button" />
							<a href="items.php">
   <button>Cancel</button>
</a>
						</form>
					</div>
			<?php

                    }

                    mysqli_close($conn);
                }
            ?>

			<br><br>

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
