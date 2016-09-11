<?php
    $host = 'localhost';
    $user = 'root'; // your user name
    $pwd = ''; // your password
    $sql_db = 'srepsdb'; // your database

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    $saleid = trim($_POST['sale_id']);

    if (!$conn) {
        // Displays an error message
        echo '<p>Database connection failure</p>'; // not in production script
    } else {
        $query = "DELETE FROM sale WHERE sale_id='$saleid'";

        $result = mysqli_query($conn, $query);

        if ($conn->query($query) === true) {
            echo 'Record deleted successfully';
            header('Location:sales.php');
        } else {
            echo 'Error deleting record: '.$conn->error;
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
