<?php
session_start();
$user_id = $_SESSION['userid'];
$name = $_SESSION['fname'];
$adm = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php include "toptitle.php" ?></title>

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

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<?php include "navbar.php"; ?>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php include "sidebar.php"; ?>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li class="active">Dashboard</li>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
<center>
<h3>Edit User Profile</h3>

<?php 
$id = $_GET['id'];
$sel = "SELECT * FROM users WHERE id='$id'";
$selresult = mysql_query($sel);
while($row=mysql_fetch_array($selresult)){
$fname = $row['fname'];
$sname = $row['sname'];
//$uname = $row['username'];
$_SESSION['admin'] = $row['admin'];
$_SESSION['pwd'] = $row['password'];
$_SESSION['email']= $row['email'];
$_SESSION['id']= $row['id_no'];
$_SESSION['phone']= $row['mobile_no'];
$_SESSION['Pin']= $row['pin'];
$_SESSION['fax']= $row['fax_no'];
$_SESSION['add']= $row['address'];


}

?><br />
<table border="0">
<form action="" method="post" name="company_to" onsubmit="return validate()">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<tr><td>First Name</td><td><input type="text" style="width: 800px;" name="fnamed" value="<?php echo $fname; ?>" /></td></tr>
<tr><td>Second Name</td><td><input type="text" style="width: 800px;" name="snamed" value="<?php echo $sname; ?>" /></td></tr>
<tr><td>Pin Number</td>

<td>

<input type="text" maxlength="11"  style="width: 800px;" pattern="^[a-zA-Z][0-9a-zA-Z]{10}$" title="Pin to be atleast 11 characters long and start with a character"  class="span12" placeholder="Pin Number" name="pind" value="<?php echo $_SESSION['Pin']; ?>" required />



<!--<input type="text" minlength="11"  pattern="/^[a-z].*[a-z]$/igm" title="Please enter a valid pin number format.First and last character to be a letter and atleast 11 characters long" minlength="11" style="width: 800px;" name="pind" value="<?php echo $_SESSION['Pin']; ?>" />--></td></tr>
<tr><td>Mobile No.</td><td><input type="text" style="width: 800px;" name="phoned" value="<?php echo $_SESSION['phone']; ?>" /></td></tr>
<tr><td>Email</td><td><input type="text" style="width: 800px;" name="emaild" value="<?php echo $_SESSION['email']; ?>" /></td></tr>
<tr><td>Address</td><td><input type="text" style="width: 800px;" name="add" value="<?php echo $_SESSION['add']; ?>" /></td></tr>
<tr><td>ID No.</td><td><input type="text" style="width: 800px;" name="idd" value="<?php echo $_SESSION['id']; ?>" /></td></tr>
<tr><td>Fax No.</td><td><input type="text" style="width: 800px;" name="faxd" value="<?php echo $_SESSION['fax']; ?>" /></td></tr>
<tr><td>Password</td><td><input type="password" minlength="6" style="width: 800px;" name="old" required /></td></tr>
<tr><td>Retype Password</td><td><input type="password" style="width: 800px;" name="new" required /></td></tr>
<tr><td></td></tr>
<tr><td></td><td>
<input type="submit" class="btn-primary" name="update" value="update" />
<!--<input type="reset" class="btn-primary"  value="Clear" />-->
</td></tr>

</form>
</table>


<?php 
if($_POST['update']){

$old=trim($_POST['old']);
$new=trim($_POST['new']);


if(strcmp($old, $new) == 0){

$encrypt = sha1($new);

$users = "UPDATE users SET fname='$_POST[fnamed]',sname='$_POST[snamed]',pin='$_POST[pind]',password='$encrypt',mobile_no='$_POST[phoned]',email='$_POST[emaild]',id_no=$_POST[idd],fax_no=$_POST[faxd],address='$_POST[add]'  WHERE id='$_POST[id]'";
$userssql = mysql_query($users);
if($userssql){ 
echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
echo "window.location = \"dashboard.php\";";
echo "</script>";
}
else { echo "Error Failed!";}

}else{
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
echo "alert('Passwords do not match')";
echo "</script>";

}

}

?>

</center>
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
	</body>
</html>
