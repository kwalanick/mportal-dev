<?php
session_start();
//check if the session has expired
$now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
           //insret into logs
          $slog_sql="insert into loghist(user_id,login,logged,activity) values('$userid',now(),'Y','logout')";
          $slog = mysql_query($slog_sql);
            session_destroy();
            
           echo "<form method='POST' action='index.php' id='DeleteUserForm'>";
           echo "<input type='hidden' name='exp' value='1' />";
           echo "</form>";


            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "document.getElementById('DeleteUserForm').submit()";
            
            echo "</script>";
        }else{

          $user_id = $_SESSION['userid'];
          $name = $_SESSION['fname'];
          $adm = $_SESSION['admin'];

          
          //$user_confirm_rows=mysql_num_rows($user_confirm_ag);


        }




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
$activeopen8 = "active open";
//$active1 = "active";
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





<form class="form-horizontal" action="client.php" method="post">
<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
<tr>
<td>
<div class="form-group">
<label>Policy No</label>
<input type="text" name="pol" id="pol"  required style="width: 200px;"/>
</div>
</td>

<td>
<div class="form-group">
<label>Sum Insured</label>
<input type="text" name="sum_insured" id="sum_insured"  required style="width: 200px;"/>
</div>
</td>
<?php
$user_ag = mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
          $row_ag=mysql_fetch_array($user_ag);
          $mail_ag=$row_ag['email'];

          $user_confirm_ag=mysql_query("select * from agmnf where email='".$mail_ag."'");
          $user_confirm_row=mysql_fetch_array($user_confirm_ag);
          $agent=$user_confirm_row['agent'];


?>
<td>
<div class="form-group">
<label>Agent No.</label>
<input type="text" name="agent" id="agent" value="<?php echo $agent; ?>"  required style="width: 200px;"/>
</div>
</td>

</tr>
<tr>
<td>
<div class="form-group">
<label>Period From</label>
<input type="date" name="from" id="from"  required style="width: 200px;"/>
</div>
</td>

<td>
<div class="form-group">
<label>Period To</label>
<input type="date" name="to" id="to"  required style="width: 200px;"/>
</div>
</td>

<td>
<div class="form-group">
<label>Total Premium</label>
<input type="text" name="prem" id="prem" required style="width: 200px;"/>
</div>
</td>
</tr>
<tr>
 <td>
<input type="submit" name="update" value="ADD" class="btn-primary" >

</td> 
<td>
        
</td> 
<td></td>            

</table>                                                
</form>


<?php


if($_POST['update']){

        $pol=$_POST['policy_no'];
        $agent=$_POST['agent'];
        $p_from=$_POST['from'];
        $p_to=$_POST['to'];
        $sum=$_POST['sum_insured'];
        $prem=$_POST['prem'];

        
        $sql_update="insert into agent_clients(policy_no,agent,period_from,period_to,sum_insured,total_premium) values('$pol',
        $agent,'$p_from','$p_to',$sum,$prem)";
        $upd=mysql_query($sql_update);
        if($upd){
                echo "successfully added client ";
        }else{
                echo "failed to add client ";
        }
}


if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}

echo "<tr bgcolor=$bgcolor>";

echo "<td>".$row['category']."</td>";

echo "</tr>";

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
<script type="text/javascript">
$(function() {
var oTable1 = $('#sample-table-2').dataTable( {
"aoColumns": [
{ "bSortable": false },
null, null,null, null, null,null, null, null,null, null, null,null,null,null,   
{ "bSortable": false }
] } );


$('table th input:checkbox').on('click' , function(){
var that = this;
$(this).closest('table').find('tr > td:first-child input:checkbox')
.each(function(){
        this.checked = that.checked;
        $(this).closest('tr').toggleClass('selected');
});

});


$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
function tooltip_placement(context, source) {
var $source = $(source);
var $parent = $source.closest('table')
var off1 = $parent.offset();
var w1 = $parent.width();

var off2 = $source.offset();
var w2 = $source.width();

if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
return 'left';
}
})
</script>

</body>
</html>
