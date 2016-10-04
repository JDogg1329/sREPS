<?php
//Connect and select a database
@mysql_connect('localhost', 'root', '');
@mysql_select_db('srepsdb');

//Output headers to make file downloadable
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=sreps-salesreport.csv');

//Write the output to  buffer
$data = fopen('php://output', 'w');

//Output Column Headings
fputcsv($data, array('Sale ID', 'Email Address', 'Date', 'Sale Quantity', 'Item ID', 'Item Name', 'Item Category', 'Quantity', 'Price'));

//Retrieve the data from database
$rows = @mysql_query("SELECT *
FROM `sale`
INNER JOIN `item`
ON sale.item_id=item.item_id
WHERE `date` LIKE CONCAT(YEAR(NOW()), '-', MONTH(NOW()), '%')");

//Loop through the data to store them inside CSV
while ($row = mysql_fetch_assoc($rows)) {
    fputcsv($data, $row);
}
