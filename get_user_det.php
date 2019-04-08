<?php 
include 'connect.php';
$user_id=$_POST['user'];
$resultset = mysql_query("SELECT * FROM users where id=$user_id");
$row=mysql_fetch_array($resultset);

echo "{";

	echo "\"FNAME\":";
	echo json_encode($row['fname']);
	echo ",";

	echo "\"SNAME\":";
	echo json_encode($row['sname']);
	echo ",";

	echo "\"ADMIN\":";
	echo json_encode($row['admin']);
	echo ",";

	echo "\"ADDRESS\":";
	echo json_encode($row['address']);
	echo ",";

	echo "\"EMAIL\":";
	echo json_encode($row['email']);
	echo ",";

	echo "\"ID\":";
	echo json_encode($row['id_no']);
	echo ",";

	echo "\"MOBILE\":";
	echo json_encode($row['mobile_no']);
	echo ",";

	echo "\"TEL\":";
	echo json_encode($row['telephone_no']);
	echo ",";

	echo "\"PIN\":";
	echo json_encode($row['pin']);
	echo ",";

	echo "\"RATE\":";
	echo json_encode($row['override_rate']);

	

echo "}";




 ?>