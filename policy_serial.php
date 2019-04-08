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
<title><?php include "toptitle.php" ?>

<body>
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen4 = "active open";
$active8 = "active";
include "sidebar.php"; 
?>

<div class="main-content">
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

<div class="page-content">
<div class="row-fluid">
        <div class="span12">
                <!--PAGE CONTENT BEGINS-->

<?php

$serial = mysql_query("select * from classbr");

while($row=mysql_fetch_array($serial))
{
    $start_serial = $row['start_serial'];
    $end_serial = $row['end_serial'];
    $next_serial = $row['policy_serial'];

}

?>


<form class="form-horizontal" action="policy_serial.php" method="post">

<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
 <thead>
 <tr>  
        <th>Start Serial</th>
        <th>End Serial</th>
        <th>Next Serial</th>
 </tr>  

 </thead>

 <tbody>
    <tr>   
        <td>
            <div class="form-group">
            <input type="text" name="start_serial" id="start_serial"  value="<?php echo  $start_serial;?> " required style="width: 200px;"/>
            </div>
        </td>

        <td>
            <div class="form-group">
                <input type="text" name="end_serial" id="end_serial" value="<?php echo  $end_serial;?> " required style="width: 200px;"/>
            </div>
        </td>

        <td>
            <div class="form-group">
                <input type="text" name="next_serial" id="next_serial" value="<?php echo  $next_serial;?> " required style="width: 200px;"/>
            </div>
        </td>

    </tr>

    <tr>
        <td>
        <input type="submit" name="update_serial" value="UPDATE" class="btn-primary" >
        </td>
        <td></td>
        <td></td>
    </tr> 
            
</tbody>
</table>                                                
</form>


<?php


if($_POST['update_serial'])
{
     $s_serial = $_POST['start_serial'];
     $e_serial = $_POST['end_serial'];
     $p_serial = $_POST['next_serial'];
     

    
     $update_serial = mysql_query("update classbr set start_serial=$s_serial , 
                                                       end_serial=$e_serial,
                                                       policy_serial=$p_serial

                                                       ");  
                                                       
     if($update_serial)
     {
        echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
        echo "window.location = \"policy_serial.php\";";
        echo "</script>";
     }                                                     
       


}
?>	





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

<script type="text/javascript">
if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

<!--ace scripts-->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!--inline scripts related to this page-->

</body>
</html>
