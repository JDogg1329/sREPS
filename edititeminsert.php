<?php
    $host = 'localhost';
    $user = 'root'; // your user name
    $pwd = ''; // your password
    $sql_db = 'srepsdb'; // your database

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    //Seperate POST variable into each php variable
    $itemid = trim($_POST['item_id']);
    $newitemname = trim($_POST['item_name']);
    $newitemcategory = trim($_POST['item_category']);
    $newitemquantity = trim($_POST['item_quantity']);
    $newitemprice = trim($_POST['item_price']);

    if (!$conn) {
        // Displays an error message
        echo '<p>Database connection failure</p>'; // not in production script
    } else {
        //update table with variable.
        $query = "UPDATE item SET item_name = '$newitemname', item_category = '$newitemcategory', item_quantity = '$newitemquantity', item_price = '$newitemprice' WHERE item_id = '$itemid'";

        $result = mysqli_query($conn, $query);

        if ($conn->query($query) === true) {
            //if update table successful
            echo 'Record edited successfully';
            header('Location:items.php');
        } else {
            echo 'Error editing record: '.$conn->error;
        }

        // if(!$result)
        // {
        // 	 echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
        // }
        // else
        // {
        // 	 header('Location:items.php');
        // }

    mysqli_close($conn);
    }
