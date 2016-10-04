<?php
    session_start();
    include 'header.php';
    require_once 'stats.php'?>
<div class="main-container">
	<div class="main wrapper clearfix">
	<center><h1>Reports</h1></center>
    <?php
    //displaying low stock
    $host = 'localhost';
    $user = 'root'; // your user name
    $pwd = ''; // your password
    $sql_db = 'srepsdb'; // your database

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        // Displays an error message
        echo '<p>Database connection failure</p>'; // not in production script
    } else {
        //$query = 'select * from sale WHERE date ';
        $query = "SELECT *
FROM `sale`
INNER JOIN `item`
ON sale.item_id=item.item_id
WHERE `date` LIKE CONCAT(YEAR(NOW()), '-', MONTH(NOW()), '%')";

        $result = mysqli_query($conn, $query);

        echo '<div id="contact-form">';
        echo '<h1>Monthly sales report</h1>';

        if (!$result) {
            //If something is wrong with the connection or query
            echo '<p>Something is wrong with ', $query, '</p>';
        } else {
            echo '<table id="itemlist" border="1">';
            echo '<tr>'
                .'<th scope="col">Sale ID</th>'
                .'<th scope="col">Sale Quantity</th>'
                .'<th scope="col">Item ID</th>'
                .'<th scope="col">Item Name</th>'
                .'<th scope="col">Price</th>'
                .'</tr>';
            $finalf_price = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $total_price = $row['item_price'] * $row['sale_quantity'];

                $final_price = $row['item_price'] * $row['sale_quantity'];
                $finalf_price += $final_price;
                echo '<tr>';
                echo '<td>',$row['sale_id'],'</td>';
                echo '<td>',$row['sale_quantity'],'</td>';
                echo '<td>',$row['item_id'],'</td>';
                echo '<td>',$row['item_name'],'</td>';
                echo '<td>','$', $total_price,'</td>';
                echo '</tr>';
                //$final_price = $total_price + $total_price;
            }

            echo '</table>Total sales: $',$finalf_price;
            echo '<br /><a href="export.php">Export to .csv</a>';
        }
        echo '</div>';
    }
    //finish displaying low stock

    ?>
    </div>

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
