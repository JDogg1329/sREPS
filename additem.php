<?php

	require("dbconn.php");
		//query

		//collect variable from POST and store each into a usable variable
		$itemname = trim($_POST['item_name']);
		$itemcategory = trim($_POST['item_category']);
		$itemquantity = trim($_POST['item_quantity']);
		$itemprice = trim($_POST['item_price']);

		$query = "insert into item (item_id, item_name, item_category, item_quantity, item_price)
				value (NULL, '$itemname', '$itemcategory', '$itemquantity', '$itemprice')";

		//insert query into table
		$result = mysqli_query($conn, $query);

		if(!$result)
		{
			 echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
		}
		else
		{
			//if successful, automatic go to item page.
			 header('Location:items.php');
		}

		mysqli_close($conn);
?>
