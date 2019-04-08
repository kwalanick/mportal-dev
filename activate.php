<?php
include 'connect.php';
$code=$_GET['cd'];
//echo $sql_email=;
$result=mysql_query("select * from mail_activate where code=".$code);
$row=mysql_fetch_array($result);
//echo $row['email'];


echo $sql_update="update users set active=1 where email='$row[email]'";
$success=mysql_query($sql_update);
if($success){

	 echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
     echo "window.location = \"index.php\";";       
     echo "</script>";

}else{

	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
     echo "alert('activate failed.Please contact support')";    
     echo "</script>";


}












?>