<?php
    $host = 'localhost';
    $user = 'root'; // your user name
    $pwd = ''; // your password
    $sql_db = 'srepsdb'; // your database

    //connecting to database
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        // Displays an error message
        echo '<p>Database connection failure</p>'; // not in production script
    }
