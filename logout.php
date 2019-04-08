<?php
session_start();
$user_id = $_SESSION['userid'];
$date = date('d/m/Y');
$time = date('H:i:s', time());
$logout = $date.' '.$time;

include 'connect.php'; 
$sqlog = "UPDATE loghist SET logout='$logout',logged='Y' WHERE user_id='$user_id' AND logged='N'";
$logresult = mysql_query($sqlog);

session_destroy();

echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
echo "window.location = \"index.php\";";
echo "</script>";

?>