<?php
session_start();

//check if the session has expired
$now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
             //insret into logs
          $slog_sql="insert into loghist(user_id,login,logged,activity) values('$userid',now(),'Y','logout')";
          $slog = mysql_query($slog_sql);
            
           echo "<form method='POST' action='index.php' id='DeleteUserForm'>";
           echo "<input type='hidden' name='exp' value='1' />";
           echo "</form>";


            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "document.getElementById('DeleteUserForm').submit()";
            
            echo "</script>";
        }else{

          include 'connect.php';

          $user_id = $_SESSION['userid'];
          $name = $_SESSION['fname'];
          $adm = $_SESSION['admin'];
          /*$sql_ag="SELECT * FROM users where id=".$_SESSION['userid'];

           $user_ag = mysql_query($sql_ag);
            $row_ag=mysql_fetch_array($user_ag);
                    $mail_ag=$row_ag['email'];

                    $user_confirm_ag=mysql_query("select * from agmnf where email='".$mail_ag."'");
                    $user_confirm_rows=mysql_num_rows($user_confirm_ag);
                    $user_agnt_row=mysql_fetch_array($user_confirm_ag);

                    if($user_confirm_rows > 0){

                    $_SESSION['agent']=$user_agnt_row['agent'];

                    }else{
                         $_SESSION['agent']='DIRECT';
                         
                    } */

        }






?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php include "toptitle.php" ?>

  <body ">

    <?php include "navbar.php"; ?>

    <div class="main-container container-fluid">
      <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
      </a>

<?php 
$activeopen = "active open";
//$active = "active";
include "sidebar.php"; 
?>

      <div class="main-content"  >
        <div class="breadcrumbs" id="breadcrumbs">
          <ul class="breadcrumb">
            <li class="active">Marine Portal</li>
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

        <div class="page-content"  >
          <div class="row-fluid" >
            <div class="span12">


              <!--PAGE CONTENT BEGINS-->
               <!--<center><img src="/marine/images/marine1.jpg" width="700" height="700"></center>-->
<?php
//sum up items
$tcomp=mysql_num_rows(mysql_query("select * from certificates where userid=".$_SESSION['userid']));


$mobile_no = mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
$rowno=mysql_fetch_array($mobile_no);
$my_number=$rowno['mobile_no'];

$tquote=mysql_num_rows(mysql_query("SELECT * FROM cltsms where creator=".$_SESSION['userid']."  or receiver=".$my_number));
$tsms=mysql_num_rows(mysql_query("select * from cargocat "));
$tfaq=mysql_num_rows(mysql_query("select * from cargotype "));
$tinter=mysql_num_rows(mysql_query("select * from Available "));
$tclt=mysql_num_rows(mysql_query("select * from laclient"));

  ?>
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo number_format($tcomp); ?></h3>
                  <p>Marine Certificates Issued</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="viewcert.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo number_format($tquote); ?></h3>
                  <p>My Chats</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="cltsms2.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo number_format($tsms); ?></h3>
                  <p>Marine Cargo Categories</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="cargocat.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo number_format($tfaq); ?></h3>
                  <p>Marine Cargo Types</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="cargotype.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-navy">
                <div class="inner">
                  <h3><?php echo number_format($tinter); ?></h3>
                  <p>Available Report Types</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-lime">
                <div class="inner">
                  <h3><?php echo number_format($tclt); ?></h3>
                  <p>Frequently Asked Questions</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
 



              <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->

          </div><!--/.row-fluid-->
          
        </div><!--/.page-content-->

        <div class="ace-settings-container" id="ace-settings-container">
          <?php include "chooseskin.php"; ?>
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
