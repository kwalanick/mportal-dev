<?php
$faq=$_POST['id'];
include 'connect.php';
$sql="delete from faqs where faqid='$faq'";
$faq_result = mysql_query($sql);
$number=mysql_affected_rows();
if($number>0){
	$rep["status"]=1;
	echo json_encode($rep);

}else{

	$rep["status"]=0;
	echo json_encode($rep);

}

?>