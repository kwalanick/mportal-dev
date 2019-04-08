<?php
$cargo_cat=$_POST['catid'];
include 'connect.php';
$sql="delete from cargocat where catid='$cargo_cat'";
$cargo_cat = mysql_query($sql);
$number=mysql_affected_rows();
if($number>0){
	$rep["status"]=1;
	echo json_encode($rep);

}else{

	$rep["status"]=0;
	echo json_encode($rep);

}

?>