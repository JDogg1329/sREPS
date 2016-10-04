<?php
    session_start();
    include 'header.php';
    require_once 'stats.php'?>
<div class="main-container">
	<div class="main wrapper clearfix">

	<article>
		<header>
			<?php
                if (!isset($_SESSION['email'])) 
                {
                    echo "<h1>Please login</h1>
							<p>To use the sREPS system you need to login, if you don't have an account please register first.</p>";
                    echo "<a href='log.php' class='btn btn-success' role='button'>Login</a>  ";
                    echo "<a href='register.php' class='btn btn-warning' role='button'>Register</a>";
                } 
                else 
                {
                    echo "<img src='https://raw.githubusercontent.com/JDogg1329/sREPS/master/wiki/logo.jpg'>";
                    echo '<h1>Welcome to sREPS ' , $_SESSION['email'].'</h1>';
                    echo '<p>Current date: ', date('l jS \of F Y h:i:s A').'</p>';
                    echo '<p>Total products in inventory: ', $num_rows;
                    echo '<p>Total sales: ', $num_rows2;

                    //displaying low stock
                    $host = 'localhost';
                    $user = 'root'; // your user name
                    $pwd = ''; // your password
                    $sql_db = 'srepsdb'; // your database

                    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

                    if (!$conn) 
                    {
                        // Displays an error message
                        echo '<p>Database connection failure</p>'; // not in production script
                    } 
                    else 
                    {
                        $query = 'select * from item WHERE item_quantity < 25';

                        $result = mysqli_query($conn, $query);

                        echo '<div id="contact-form">';
                        echo '<h1>Low on Stock</h1>';

                        if (!$result) 
                        {
                            //If something is wrong with the connection or query
                            echo '<p>Something is wrong with ', $query, '</p>';
                        } 
                        else 
                        {
                            echo '<table id="itemlist" border="1">';
                            echo '<tr>'
                                .'<th scope="col">ID</th>'
                                .'<th scope="col">Name</th>'
                                .'<th scope="col">Category</th>'
                                .'<th scope="col">Quantity</th>'
                                .'<th scope="col">Price</th>'
                                .'</tr>';
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>';
                                echo '<td>',$row['item_id'],'</td>';
                                echo '<td>',$row['item_name'],'</td>';
                                echo '<td>',$row['item_category'],'</td>';
                                echo '<td>',$row['item_quantity'],'</td>';
                                echo '<td>',$row['item_price'],'</td>';
                                echo '</tr>';
                            }

                            echo '</table>';
                        }
                        echo '</div>';

                    }
                    //finish displaying low stock
                }
            ?>
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
