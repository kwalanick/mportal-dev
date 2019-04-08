<?php
include "connect.php";
echo "Marine Portal";
?>

</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		
		<link rel="stylesheet" href="styles.css" />
                <link rel="stylesheet" href="assets/css/dashboard.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
//$user=$_GET['User'];
$pid=$_GET['pid'];
$hid=$_GET['hid'];
$nid=$_GET['nid'];
$mid=$_GET['mid'];
$lid=$_GET['lid'];
$wid=$_GET['wid'];
$tid=$_GET['tid'];
$yid=$_GET['yid'];
$zid=$_GET['zid'];
$help=$_GET['help'];
$search=$_GET['search'];
$sd=$_GET['sdname'];
if(isset($_GET['vid'])){
	$vid=$_GET['vid'];
	//echo $id;
}
session_start();
$_SESSION['USERNAME']=$_GET['user'] ;
$user=$_SESSION['USERNAME'];
?>	
	</head>