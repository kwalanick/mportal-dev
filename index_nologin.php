<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php include "toptitle.php" ?>

	<body>
		<?php include "navbar.php"; ?>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php 
			$activeopen0 = "active open";
			$active0 = "active";
			include "sidebar.php"; 
			?>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li class="active">Aims Help</li>
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
<?php
if($help=='n'){
	echo 'Help is not required'.' <br/>'.'No help is available for this menu item';
}
	if($pid==$pid and $help=="y" and empty($hid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$pid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>'; 
	
		$qry1="SELECT * FROM AIMSHELP WHERE PROG_ID='".$pid."' AND HIDDEN='0' ORDER BY HELP_ID";
		$rst1=oci_parse($conn,$qry1);
		oci_execute($rst1);
		while(($row=oci_fetch_array($rst1,OCI_ASSOC))!= false){
		echo '<ul>';
		echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
		echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
		echo '</ul>';
	} }
	
if(isset($hid) and $help=="y" and empty($nid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$hid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$hid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$hid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }
if(isset($nid) and $help=="y" and empty($mid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$nid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 
	  $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$nid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$nid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }	
if(isset($mid) and $help=="y" and empty($lid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$mid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 
	 $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$mid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$mid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }	
if(isset($lid) and $help=="y" and empty($wid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$lid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 
	  $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$lid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$lid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }	
if(isset($wid) and $help=="y" and empty($tid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$wid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$wid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$wid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }	
if(isset($tid) and $help=="y" and empty($yid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$tid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 
	  $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$tid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$tid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }	
if(isset($yid) and $help=="y" and empty($zid)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$yid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	
	 $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$yid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$yid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }		
if(isset($zid) and $help=="y" and empty($id)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$zid."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	 
	  $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$zid."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:90%;width:60%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$zid."' AND HIDDEN='0' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
		} }	
if(isset($search)){
	$qry=oci_parse($conn,"SELECT PROG_NAME FROM HELPPROGS WHERE PROG_ID='".$search."' ");
	oci_execute($qry);
	$row=(oci_fetch_row($qry));
	echo '<h2>'.$row[0].'</h2>';
	
	 $imgsql=oci_parse($conn,"SELECT IMAGE FROM SDFILES WHERE PROG_ID='".$search."' ");
	 oci_execute($imgsql);
	 $imgrow=(oci_fetch_row($imgsql));
	 $image=$imgrow[0];
	 if (!empty($image)) {?>
	
	<image src="<?php echo $image; ?>" alt="Aimshelp" align="center" style="height:100%;width:70%;margin-left:15%;">
	<?php }
	    $query="SELECT * FROM AIMSHELP WHERE PROG_ID='".$search."' ORDER BY HELP_ID";
			$rst=oci_parse($conn,$query);
			oci_execute($rst);
			while(($row=oci_fetch_array($rst,OCI_ASSOC))!= false){
				echo '<ul>';
				echo '<li>'.'<b>'.$row['HELP_NAME'].'</b>'.'</li>';
				echo '<ul>'.'<li>'.$row['DESCRIPTION'].'</li>'.'</ul>';
				echo '</ul>';
} }			
?>





							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					
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
