<?php

$link = mysqli_connect('localhost', 'root', '', 'srepsdb');

// item rows
$result = mysqli_query($link, 'SELECT * FROM item');

$num_rows = mysqli_num_rows($result);

//sales rows
$result2 = mysqli_query($link, 'SELECT * FROM sale');
$num_rows2 = mysqli_num_rows($result2);
