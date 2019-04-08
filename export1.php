<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$from=$_POST['periodfrom'];
$to=$_POST['periodto'];
 
  // output headers so that the file is downloaded rather than displayed


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id', 'category', 'cargo_type', 'shipping_mode', 'package_type', 'shp_cover_type', 'sum_insured', 'country_orig', 'country_dest', 'city_orig', 'city_dest', 'owner', 'email', 'mobile', 'p_from', 'p_to', 'pin', 'premium', 'userid', 'Total_premium', 'paid', 'pesa_track_id', 'remark', 'amount', 'vessel', 'vessel_no'));

include 'connect.php';
$sql_select="SELECT * FROM certificates where p_from>=".$from." or p_from<=".$to;
$rows = mysql_query($sql_select);
//$rows = mysql_query('SELECT * FROM certificates');


// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)){
    fputcsv($output, $row);
} 





?>