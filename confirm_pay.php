<?php
include 'connect.php';
if($_GET['pesapal_merchant_reference']){
$ref=$_GET['pesapal_merchant_reference'];
$tracker=$_GET['pesapal_transaction_tracking_id'];

$sql="update certificates set paid=0 where id=$ref";
$paid_confirm = mysql_query($sql);
if($paid_confirm){
	$sql2="update certificates set pesa_track_id='$tracker' where id=$ref";
	$tracker_confirm = mysql_query($sql2);
	if($tracker_confirm){
		
		header("location: viewcert.php");
		//header("location: http://localhost/marine/viewcert.php");

}
}


}elseif ($_POST['id']) {
	$sql="update certificates set paid=1 where id=".$_POST['id'];
	$paid_confirm = mysql_query($sql);
	if($paid_confirm){
	//$sql2="update certificates set pesa_track_id='$tracker' where id=$ref";
	//$tracker_confirm = mysql_query($sql2);
	//if($tracker_confirm){
	echo "{";
	echo "\"STATUS\":";
	$val=1;
	echo json_encode($val);
    echo "}";
		//header("location: http://192.168.1.56/marine/viewcert.php");

//}
}
}

?>