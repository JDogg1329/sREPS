<?php

session_start();

    require 'dbconn.php';

        //store session to php variable
        $user_email = $_SESSION['email'];
        //store current date to variable
        $currentdate = date('Y-m-d');
        //store POST array to variable
        $quantity = $_POST['item_quantity'];
        $itemname = $_POST['itemname'];
        //$iteminsertid = $_POST['iteminsertid'];


        $query = "insert into sale (sale_id, user_email, date, sale_quantity, item_id)
				value (NULL, '$user_email', '$currentdate', '$quantity', '$itemname')";

        $query2 = "UPDATE item SET item_quantity=(item_quantity - '$quantity') WHERE item_id='$itemname'";

        //exceute query to database
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);

        if (!$result && !$result2) {
            echo '<p class="wrong">Something is wrong with ', $query, '</p>';
        } else {
            //if successful then go to sale page
            header('Location:sales.php');
            //echo "$query";
            //echo "<br>";
        }

        mysqli_close($conn);
