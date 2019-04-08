<?php
$cargo_type=$_POST['ctype'];
include 'connect.php';
$sql="delete from cargotype where ctypeid='$cargo_type'";
$cargo_types = mysql_query($sql);
$number=mysql_affected_rows();
if($number>0){
	$rep["status"]=1;
	echo json_encode($rep);

}else{

	$rep["status"]=0;
	echo json_encode($rep);

}

?>