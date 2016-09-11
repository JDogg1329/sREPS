
<?php
// Database connection
session_start();
include 'header.php';

$host = 'localhost';
$user = 'root'; // your user name
$pwd = ''; // your password
$sql_db = 'srepsdb'; // your database

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

//Displaying Table from Item database
if (!$conn) {
    // Displays an error message
  echo '<p>Database connection failure</p>'; // not in production script
} else {
    //SQL query for selecting from table
  $query = 'select * from item';

    $result = mysqli_query($conn, $query); ?>
  <div class="main-container">
    <div class="main wrapper clearfix">


          <!-- ID for CSS -->
          <div id="contact-form">
            <h1>Add an Item</h1>

            <!-- Add item form -->
            <form action="additem.php" method="post">
              <label>Name: <input type="text" name="item_name" size="20"></label>

              <br>

              <label>Category: <input type="text" name="item_category" size="20"></label>

              <br>

              <label>Quantity: <input type="text" name="item_quantity" size="20"></label>

              <br>

              <label>Price: <input type="text" name="item_price" size="20"></label>

              <br><br>

              <label>&nbsp; </label> <input type="submit" value="Submit" class="button" />
              <input type="reset" value="Cancel" class="button" />
            </form>
          </div>


          <div id="contact-form">
            <h1>Inventory</h1>

            <?php

            if (!$result) {
                //If something is wrong with the connection or query
              echo '<p>Something is wrong with ', $query, '</p>';
            } else {
                //displaying table on page load
              echo '<table id="itemlist" border="1">';
                echo '<tr>'
              .'<th scope="col">ID</th>'
              .'<th scope="col">Name</th>'
              .'<th scope="col">Category</th>'
              .'<th scope="col">Quantity</th>'
              .'<th scope="col">Price</th>'
              .'<th scope="col">Edit</th>'
              .'<th scope="col">Delete</th>'
              .'</tr>';

              //Fetch data and store into array. Run loop for each row of result return.
              while ($row = mysqli_fetch_assoc($result)) {
                  $itemtable = '';

                  echo '<tr>';
                  echo '<td>',$row['item_id'],'</td>';
                  echo '<td>',$row['item_name'],'</td>';
                  echo '<td>',$row['item_category'],'</td>';
                  echo '<td>',$row['item_quantity'],'</td>';
                  echo '<td>',$row['item_price'],'</td>';
                  echo "<td><form action='edititem.php' method='POST'><input type='hidden' name='item_id' value='".$row['item_id']."'/><input type='submit' name='submit-btn' value='Edit' /></form></td>";
                  echo "<td><form action='deleteitem.php' method='POST'><input type='hidden' name='item_id' value='".$row['item_id']."'/><input type='submit' name='submit-btn' value='Delete' /></form></td>";
                  echo '</tr>';
              }

                echo '</table>';
            }
}
          ?>
        </div>


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
