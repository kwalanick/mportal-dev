<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php include "toptitle.php" ?></title>

		<meta name="description" content="User login page" />
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

	<body class="login-layout" style="background-image: url('/marine/images/hd2.jpg');" >

		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i green"><img src="images/aimshelp.gif" height="20%" width="50" /></i>
									</h1>
									<h3 class="blue">Marine Portal</h3>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
								

									<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Change Password
												</h4>

												<div class="space-6"></div>
												<p>
													Enter your Recovery code,email and new password
												</p>

                                                <form method="post" action=""/>
                                                <fieldset>
                                                    <label>
															<span class="block input-icon input-icon-right">
																<input type="number" class="span12" placeholder="Recovery code" name="code" />
																<i class="icon-envelope"></i>
															</span>
                                                    </label>

                                                    <label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="support@gmail.com" name="email123" />
																<i class="icon-envelope"></i>
															</span>
                                                    </label>

                                                    <label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="password" name="pwd_rec" />
																<i class="icon-envelope"></i>
															</span>
                                                    </label>

                                                    <label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="confirm password" name="pwd_rec_con" />
																<i class="icon-envelope"></i>
															</span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button class="width-35 pull-right btn btn-small btn-danger" name="forgot" value="forgot">
                                                            <i class="icon-lightbulb"></i>
                                                            Change
                                                        </button>
                                                    </div>
                                                </fieldset>
                                                </form>
											</div><!--/widget-main-->
											<div class="toolbar center">
												<a href="index.php" class="back-to-login-link">
													Back to login
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->


								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->
<?php

    

if($_POST['forgot']){


$mail=$_POST['email123'];
$code=$_POST['code'];
$p1=$_POST['pwd_rec'];
$p2=$_POST['pwd_rec_con'];
$sql_check="select * from p_recovery where email='$mail' and code=$code";
$is_user=mysql_query($sql_check);
$is_resuts=mysql_num_rows($is_user);


if($is_resuts>0){

	//check if passwords match
	if (strcmp($p1, $p2) == 0){

$encrypted=sha1($p1);
$slq_code="update users set password='$encrypted' where email='$mail'"; 
$changed = mysql_query($slq_code);
if($changed){

	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	//echo "alert('Password changed successfully')";
    echo "window.location.href='http://192.168.1.56/marine'";
    echo "</script>";

     //header("Location: http://192.168.1.56/marine/");
     
 
}else{


	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "alert('Password Recovery Failed')";
    echo "</script>";


}
}else{
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "alert('Passwords dont match')";
    echo "</script>";


}

}else{

	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "alert('You do not have an active account with us')";
    echo "</script>";
}


}




 ?>
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

		<script type="text/javascript">
			
			 $('.widget-box.visible').removeClass('visible');
			 $('#forgot-box').addClass('visible');
			
		</script>
	</body>
</html>
