<?php
session_start();
if ($_POST['exp']==1)
{
	        echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "alert('Your session has expired.Please log in to continue')";
            
            echo "</script>";
}
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

<style type="text/css">
	floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
	<body class="login-layout" style="background-image: url('/marine/images/hd4.jpg');" >

		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<!--<i green"><img src="images/aimshelp.gif" height="20%" width="50" /></i>-->
										<i green"><img src="images/amarco1.jpg" height="20%" width="50" /></i>
									</h1>
									<h3 style="color: #006CFF  ">Marine Portal</h3>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Login Details
												</h4>

												<div class="space-6"></div>

												<form action='' method='post' >
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" name="email" class="span12" placeholder="Email" required />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" class="span12" placeholder="Password" required minlength="3" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
																<!--<input type="submit" name="login" value="login" align="right">-->
														<button class="width-35 btn btn-small btn-primary" name="login" value="login" />
															<i class="icon-key"></i>
															Login
														</button>												
															
														</div>
														

														<div class="space-4"></div>
													</fieldset>
												</form>

												
											</div><!--/widget-main-->

											<div class="toolbar clearfix">
												<div>
													<a href="#" onClick="show_box('signup-box'); return false;" class="user-signup-link">
														<i class="icon-arrow-left"></i>
														Individual register
													</a>
												</div>

												<div>
														
														<a href="#" onClick="show_box('agent'); return false;" class="user-signup-link">
														Agent     register     
														<i class="icon-arrow-right"></i>
													</a>
												</div>


											</div>


											

											<div align="center" style="padding-right:3px;" class="toolbar clearfix">
												<div >
													<a href="#" onClick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="icon-arrow-left"></i>
														
														forgot my password
													</a>
												</div>

												<div >
													<a href="quote.php" class="forgot-password-link">
														
														
														Premium Estimation
														<i class="icon-arrow-right"></i>
													</a>
												</div>

											</div>




										</div><!--/widget-body-->
									</div><!--/login-box-->

									<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Retrieve Password
												</h4>

												<div class="space-6"></div>
												<p>
													Enter your email and to receive instructions
												</p>

                                                <form method="post" action=""/>
                                                <fieldset>
                                                    <label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="support@gmail.com" name="email123" />
																<i class="icon-envelope"></i>
															</span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button class="width-35 pull-right btn btn-small btn-danger" name="forgot" value="forgot">
                                                            <i class="icon-lightbulb"></i>
                                                            Send Me!
                                                        </button>
                                                    </div>
                                                </fieldset>
                                                </form>
											</div><!--/widget-main-->
											<div class="toolbar center">
												<a href="#" onClick="show_box('login-box'); return false;" class="back-to-login-link">
													Back to login
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->

									<div id="signup-box" style="width: 400px;" class="signup-box widget-box no-border">
										
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													Individual Registration
												</h4>

                                                <form action="" method="post" name="register" />

                                                <table border="0" class="table  table-bordered  ">
                                                
                                                <tr>
                                                	<td>
														<div class="form-group">
														<input type="text" id="first" class="span6" style="width: 150px;" placeholder="First Name" name="fname" required />
														
														</div>
													</td>

													
													<td>
														<div class="form-group">
														<input type="text" id="second" class="span6" style="width: 150px;" placeholder="Last Name" name="lname" required /> 
														</div>
													</td>
													
														
													
                                                </tr>
                                                <tr>
                                                	
                                                <td>
                                                <div class="form-group">
														<input type="email" style="width: 150px;" class="span12" placeholder="Email" name="email" >
													</div>
                                                	
                                                </td>
                                                <td>
                                                	
                                                	<div class="form-group">
														<input type="text" style="text-transform:uppercase"  maxlength="11" minlength="11" style="width: 150px;" pattern="^[a-zA-Z][0-9a-zA-Z]{10}$" title="Pin to be atleast 11 characters long and start with a character"  class="span12" placeholder="Pin Number" name="pin" required />
													</div>

                                                </td>
                                                



                                                </tr>
                                                <tr>
                                                <td>
                                                	
                                                	<div class="form-group">
														<input type="number" minlength="8" maxlength="8" class="span12" style="width: 150px;" placeholder="ID No." name="id"  />
													</div>

                                                </td>
                                                <td>
                                                	
                                                	<div class="form-group">
														<input type="Number" class="span12" style="width: 150px;" placeholder="Phone Number" name="phone" required />
													</div>

                                                </td>
                                                                                              	


                                                </tr>
                                                <tr>
                                                <td>
                                                	<img src="/marine/captcha.php" id="captchaimg" >
                                                </td>
                                                <td>
                                                	<input id="6_letters_code" class="span12" style="width: 150px;" name="6_letters_code" type="text" >

                                                </td>
                                               


                                                </tr>
                                                <tr>
                                                	<td>
                                                		<input type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"  title="must have atleast one lowercase letter,one uppercase letter, a number and atleast 6 characters long" class="span12" placeholder="Password" name="password1" required  minlength="6"  />
                                                	</td>
                                                	<td>
                                                		<input type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"  title="must have atleast one lowercase letter,one uppercase letter, a number and atleast 6 characters long" class="span12" placeholder="Repeat password" name="password2" minlength="6" required />
                                                	</td>
                                                	
                                                </tr>
                                                <tr>
                                                <td>
                                                	<button type="reset" class="width-65 btn btn-small btn-info">
																
																Reset
															</button>
                                                </td>
                                                <td>
                                                <button class="width-65  btn btn-small btn-success" name="register" value="register" />

                                                                 
                                                                 Register

                                                            </button>
                                                	
                                                </td>
                                                	
                                                </tr>
                                                <tr>
                                                <td>
                                                
												<a href="#" style="color: #7EC9BA  ;" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													
													Back to login
												</a>
												</td>
												<td>
													
												</td>
											        
                                                </tr>

                                                </table>
														
												</form>
											

											</div>
										
									</div><!--/signup-box-->

										<div id="agent" style="width: 400px;" class="signup-box widget-box no-border">
										
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													Agent Registration
												</h4>

                                                <form action="" method="post" name="ag" />

                                                <table border="0" class="table  table-bordered  ">
                                                
                                                <tr>
                                                	<td>
														<div class="form-group">
														<input type="text" id="first" class="span6" style="width: 150px;" placeholder="First Name" name="fnameag" required />
														
														</div>
													</td>

													
													<td>
														<div class="form-group">
														<input type="text" id="second" class="span6" style="width: 150px;" placeholder="Last Name" name="lnameag" required /> 
														</div>
													</td>
													
														
													
                                                </tr>
                                                <tr>
                                                	
                                                <td>
                                                <div class="form-group">
														<input type="email" style="width: 150px;" class="span12" placeholder="Email" name="emailag" >
													</div>
                                                	
                                                </td>
                                                <td>
                                                	
                                                	<div class="form-group">
														<input type="text" style="text-transform:uppercase"  maxlength="11" minlength="11" style="width: 150px;" pattern="^[a-zA-Z][0-9a-zA-Z]{10}$" title="Please enter a valid pin number format.First and last character to be a letter and atleast 11 characters long"  class="span12" placeholder="Pin Number" name="pinag" required />
													</div>

                                                </td>
                                                



                                                </tr>
                                                <tr>
                                                	<td>
                                                		<div class="form-group">
														<input type="Number" class="span12" size="8" style="width: 150px;" placeholder="Branch" name="branch"/>
													</div>
                                                	</td>
                                                	<td>
                                                		<div class="form-group">
														<input type="Number" class="span12" size="8" style="width: 150px;" placeholder="Agent number" name="agent"/>
													</div>
                                                	</td>
                                                </tr>
                                                <tr>
                                                <td>
                                                	
                                                	<div class="form-group">
														<input type="number" minlength="8" maxlength="8" class="span12" style="width: 150px;" placeholder="ID No." name="idag" required />
													</div>

                                                </td>
                                                <td>
                                                	
                                                	<div class="form-group">
														<input type="number" minlength="10" maxlength="10" class="span12" style="width: 150px;" placeholder="Phone Number" name="phoneag" required />
													</div>

                                                </td>
                                                                                              	


                                                </tr>
                                                <tr>
                                                <td>
                                                	<img src="/marine/captcha.php" id="captchaimg" >
                                                </td>
                                                <td>
                                                	<input id="6_letters_code" class="span12" style="width: 150px;" name="6_letters_code" type="text" >

                                                </td>
                                               


                                                </tr>
                                                <tr>
                                                	<td>
                                                		<input type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"  title="must have atleast one lowercase letter,one uppercase letter, a number and atleast 6 characters long" class="span12" placeholder="Password" name="password1ag" required  minlength="6"  />
                                                	</td>
                                                	<td>
                                                		<input type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"  title="must have atleast one lowercase letter,one uppercase letter, a number and atleast 6 characters long" class="span12" placeholder="Repeat password" name="password2ag" minlength="6" required />
                                                	</td>
                                                	
                                                </tr>
                                                <tr>
                                                <td>
                                                	<button type="reset" class="width-65 btn btn-small btn-info">
																
																Reset
															</button>
                                                </td>
                                                <td>
                                                <input type="submit" class="width-65  btn btn-small btn-success" name="ag" value="Register" />

                                                              
                                                	
                                                </td>
                                                	
                                                </tr>
                                                <tr>
                                                <td>
                                                
												<a href="#" style="color: #7EC9BA  ;" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													
													Back to login
												</a>
												</td>
												<td>
													
												</td>
											        
                                                </tr>

                                                </table>
														
												</form>
											

											</div>
										
									</div><!--/signup-box-->










								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->
<?php

    if($_POST['register'])	 {

    	//check if the email is already registered 
     
      $sql_mail_confirm="select * from users where email='".$_POST['email']."'";
      $mail_chk=mysql_query($sql_mail_confirm);
      $number_recs=mysql_num_rows($mail_chk);
      
    	if( $number_recs >0){

      	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
        echo "alert('That email is already in use.Please choose another email to register')";
        echo "</script>";

      }else{

      	

    $capture=$_SESSION['digit'];

   // echo  $capture."   ".$_POST['6_letters_code'];

    	if (strcasecmp($_SESSION['digit'], $_POST['6_letters_code'])!= 0)
        {

            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "alert('Wrong Recapture Code')";
            echo "</script>";

        }else{

    $message = "";
    $email = $_POST['email'];
    $pin=$_POST['pin'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $fnameg=$_POST['fname'];
    $lnameg=$_POST['lname'];

$id=$_POST['id'];

$phone=$_POST['phone'];

     
    if (strcmp($password1, $password2) == 0)
    {


    	$passcmp=sha1($password1);
    	$reg_sql="INSERT INTO users(fname,sname,admin,password,email,id_no,mobile_no,pin,override_rate) VALUES ('$fnameg','$lnameg',0,'$passcmp','$email',$id,$phone,'$pin','0')";
    	 $reg_sql;
    	$clreg = mysql_query($reg_sql);

                if ($clreg)
                {
                    //$slq_ins="insert into p_recovery(`email`,`code`) values('".$email."',0)"; 
                    $slq_ins="insert into p_recovery(`email`,`code`) values('$email',0)"; 
                	$qry=mysql_query($slq_ins);
                	if($qry){


    

                    //send activation link to email
					$to      = $email;
					$subject = 'Account Activation';
					$code=rand ( 10000 , 99999 );
					$link="http://192.168.1.56/marine/activate.php?cd=".$code;
					$message = "Hi ".$fnameg.".Please visit ".$link." to activate your account.";
					$headers = 'From: marineportal@aims.com' . "\r\n" .
					    'Reply-To:marineportal@aims.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);

					$slq_activate="insert into mail_activate(`email`,`code`) values('$email',$code)"; 
                	$activation=mysql_query($slq_activate);
                	if($activation){
                		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    	echo "alert('SUCCESSFUL REGISTERED.PLEASE LOG IN TO YOUR EMAIL AND CLICK ON THE ACTIVATION LINK THAT WE HAVE SENT YOU!')";
                    	echo "</script>";

                    	




                	}else{

                		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                		 
	                    echo "alert('Failed to send activation email.Please contact support'+".$slq_activate.")";
	                    echo "</script>";

                	}

                	}else{
                	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "alert('Failed to add you as a user')";
                    echo "</script>";

                	}

                    
                } else
                {

                    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "alert('NOT REGISTERED!')";
                    echo "</script>";
                }
    	   
    }else{
    	 echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
         echo "alert('passwords dont match!')";
         echo "</script>";

    }
}

      }


}


if($_POST['ag']){

   
$sql_email_verify="select * from users where email='".$_POST['emailag']."'";
      $mail_chk_ag=mysql_query($sql_email_verify);
      $number_recs_ag=mysql_num_rows($mail_chk_ag);
      
    	if( $number_recs_ag >0){

      	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
        echo "alert('That email is already in use.Please choose another email to register')";
        echo "</script>";

		}
		else
		{

    	//if (strcasecmp($_SESSION['digit'], $_POST['6_letters_code'])!= 0)
        //{

            //echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            //echo "alert('Wrong Recapture Code')";
            //echo "</script>";

       // }else{

    $message = "";
    $email = $_POST['emailag'];
    $pinag =$_POST['pinag'];
    $password1=$_POST['password1ag'];
    $password2=$_POST['password2ag'];
    $fnameg=$_POST['fnameag'];
    $lnameg=$_POST['lnameag'];
    $branch=$_POST['branch'];
    $agent=$_POST['agent'];
    $agent_name= $fnameg." ".$lnameg;

//$id=$_POST['id'];

$phone=$_POST['phoneag'];
    
  
    if (strcmp($password1, $password2) == 0)
    {

    	$passcmp=sha1($password1);
    	$reg_sql="INSERT INTO users(fname,sname,password,email,mobile_no,pin,override_rate) VALUES ('$fnameg','$lnameg','$passcmp','$email',$phone,'$pinag','0')";
    	$clreg = mysql_query($reg_sql);

                if ($clreg)
                {


                	//insert agent into agmnf
                	 $sql_agmnf="insert into agmnf(branch,agent,name,email,mobile,pin,override_rate) values('$branch','$agent','$agent_name','$email','$phone','$pinag','0')";
                	$agmnf_result=mysql_query($sql_agmnf);
                	if($agmnf_result){

                		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	                    echo "alert('Agent registered')";
	                    echo "</script>";

                	}else{

                		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	                    echo "alert('Failed to register as agent')";
	                    echo "</script>";


                	}

                    //$slq_ins="insert into p_recovery(`email`,`code`) values('".$email."',0)"; 
                    $slq_ins="insert into p_recovery(`email`,`code`) values('$email',0)"; 
                	$qry=mysql_query($slq_ins);
                	if($qry){


    

                    //send activation link to email
					$to      = $email;
					$subject = 'Account Activation';
					$code=rand ( 10000 , 99999 );
					$link="http://192.168.1.56/marine/activate.php?cd=".$code;
					$message = "Hi ".$fnameg.".Please visit ".$link." to activate your account.";
					$headers = 'From: marineportal@aims.com' . "\r\n" .
					    'Reply-To:marineportal@aims.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);

					$slq_activate="insert into mail_activate(`email`,`code`) values('$email',$code)"; 
                	$activation=mysql_query($slq_activate);
                	if($activation){


                		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    	echo "alert('SUCCESSFUL REGISTERED.PLEASE LOG IN TO YOUR EMAIL AND CLICK ON THE ACTIVATION LINK THAT WE HAVE SENT YOU!')";
                    	echo "</script>";




                	}else{

                		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	                    echo "alert('Failed to send activation email.Please contact support')";
	                    echo "</script>";

                	}

                	}else{
                	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "alert('Failed to add you as a user')";
                    echo "</script>";

                	}




                } else
                {

                    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "alert('NOT REGISTERED!')";
                    echo "</script>";
                }
    	   
    }else{
    	 echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
         echo "alert('passwords dont match!')";
         echo "</script>";

    }
}
}
//}



if($_POST['forgot']){
$sql_check="select * from users where email='".$_POST['email123']."'";
$is_user=mysql_query($sql_check);
$is_resuts=mysql_num_rows($is_user);


if($is_resuts>0){



//send link to email
$to      = $_POST['email123'];
$subject = 'Password Recovery';
$code=rand ( 10000 , 99999 );
$link="http://192.168.1.56/marine/reset.php";
$message = "Your password recovery code is ".$code.".Please visit ".$link."  You will require your code to change your password";
$headers = 'From: marineportal@aims.com' . "\r\n" .
    'Reply-To:marineportal@aims.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);




$mail_rec=$_POST['email123'];

$slq_code="update p_recovery set code=$code where email='$mail_rec'"; 
$changed = mysql_query($slq_code);
if($changed){



	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "alert('Please Log in to your email and follow the instructions given to reset your password')";
    echo "</script>";

 
}else{


	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "alert('Password Recovery Failed')";
    echo "</script>";


}
}


}



if($_POST['login'])
{

$uname = $_POST['email'];
$passwd = sha1($_POST['password']);
$sqllogin = "SELECT * FROM users WHERE email='".$_POST['email']."' and password='".$passwd."' and active=1";
$resultset=mysql_query($sqllogin);
$logn_rows=mysql_num_rows($resultset);


if($logn_rows>0)
{


//echo $uname." ".$_POST['password'];


$row = mysql_fetch_array($resultset);

$userid = $row['id'];
$usrname = $row['username'];
$email=$row['email'];
$fname = $row['fname'];
$override_rate = $row['override_rate'];
$password = $row['password'];
$admin = $row['admin'];


$_SESSION['userid'] = $userid;
$_SESSION['fname'] = $fname;
$_SESSION['admin'] = $admin;
$_SESSION['override_rate'] = $override_rate;

$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + (60*60);

$user_id = $_SESSION['userid'];
$fname = $_SESSION['fname'];
$override_rate = $_SESSION['override_rate'];

$date = date('d/m/Y');
$time = date('H:i:s', time());
$login = $date.' '.$time;


//single login check
$slog_sql="insert into loghist(user_id,login,logged,activity) values('$userid',now(),'Y','login')";
$slog = mysql_query($slog_sql);
if($slog)
{
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	echo "tracking user";
	echo "</script>";

}
else
{
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	echo " failed tracking user";
	echo "</script>";

}

	 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	echo "window.location = \"dashboard.php\";";
	echo "</script>";
//}



}else{ 




$sqllogin_try2 = "SELECT * FROM users WHERE email='".$_POST['email']."' and password='".$passwd."' and active=0";
$resultset_try2=mysql_query($sqllogin_try2);
$logn_rows_try2=mysql_num_rows($resultset_try2);


if($logn_rows_try2>0){

	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	echo "alert('Please contact admin to activate your account')";
	echo "</script>";

}else{

 	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
	echo "alert('Wrong Username or Password')";
	echo "</script>";


}


	
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

		<script language='JavaScript' type='text/javascript'>
        function refreshCaptcha()
        {
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }
    </script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
				//alert(id);
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>


	</body>
</html>
