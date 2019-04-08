<?php
$doc_id=$_POST['doc_id'];
include 'connect.php';
$sql="delete from docs where id='$doc_id'";
$document = mysql_query($sql);
$number=mysql_affected_rows();
if($number>0){
	$rep["status"]=1;
	echo json_encode($rep);

}else{

	$rep["status"]=0;
	echo json_encode($rep);

}

?>