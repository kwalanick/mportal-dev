<?php 
include 'connect.php';
$constant = mysql_query("SELECT * FROM constants");
$conrow=mysql_fetch_array($constant);
$stmp=$conrow['stamp_duty'];
$fund=$conrow['policy_fund'];
$training=$conrow['Training_levy'];
$war=$conrow['war'];

echo "{";

	echo "\"STAMP\":";
	echo json_encode($stmp);
	echo ",";

	echo "\"FUND\":";
	echo json_encode($fund);
	echo ",";

	echo "\"TRAINING\":";
	echo json_encode($training);
	echo ",";

	echo "\"WAR\":";
	echo json_encode($war);



echo "}";




 ?>