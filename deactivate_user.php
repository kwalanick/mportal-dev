<?php
include 'connect.php';
$sql="update users set active=0 where id=".$_POST['user_id'];
	$confirm = mysql_query($sql);
	if($confirm){
	//$sql2="update certificates set pesa_track_id='$tracker' where id=$ref";
	//$tracker_confirm = mysql_query($sql2);
	//if($tracker_confirm){
	echo "{";
	echo "\"STATUS\":";
	$val=1;
	echo json_encode($val);
    echo "}";
		//header("location: http://192.168.1.56/marine/viewcert.php");

}else{
	echo "{";
	echo "\"STATUS\":";
	$val=0;
	echo json_encode($val);
    echo "}";
}

    ?>