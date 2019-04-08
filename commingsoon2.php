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
$activeopen1 = "active open";
$active1 = "active";
include "sidebar.php"; 
?>

<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
<ul class="breadcrumb">
        <li class="active">AimsCRM</li>
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
<div class="row-fluid">
                        <h3 class="header smaller lighter blue">Visitors dataTables</h3>
                        <div class="table-header">
                                Results for "Visitors"
                        </div>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th class="center">
                                                        <label>
                                                                <input type="checkbox" />
                                                                <span class="lbl"></span>
                                                        </label>
                                                </th>
                                                <th>Slip No.</th>
                                                <th>Image</th>
                                                <th class="hidden-480">Name</th>
                                                <th class="hidden-phone">ID_NO</th>
                                                <th class="hidden-480">Gender</th>
                                                <th class="hidden-phone">Mobile_No</th>
                                                <th class="hidden-480">Company_From</th>
                                                <th class="hidden-480">Company_To</th>
                                                <th class="hidden-480">Model</th>
                                                <th class="hidden-480">Serial_NO</th>
                                                <th class="hidden-480">Vehicle</th>
                                                <th class="hidden-480">Status</th>
                                                <th class="hidden-480"></th>
                                                <th class="hidden-480"></th>
                                                <th></th>
                                        </tr>
                                </thead>

                                <tbody>


<?php
$visit = "SELECT * FROM visitors ORDER BY id DESC";
$visitsql = mysql_query($visit);
while($row=mysql_fetch_array($visitsql)){

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}

echo "<tr bgcolor=$bgcolor>";
echo "<td class='center'>
<label>
<input type='checkbox' />
<span class='lbl'></span>
</label>
</td>";
echo "<td>".$row['id']."</td>";
echo "<td><img src='".$row['vphoto']."' height='30px' width='50px'></td>";
echo "<td><font face='times new roman' size='2'>".$row['name']."</font></td>";
$idtype = mysql_query("SELECT * FROM idtype WHERE id='$row[id_type]'");
while($idtyperow=mysql_fetch_array($idtype)){
$idtypedes = $idtyperow['idtype'];
}
echo "<td><font face='times new roman' size='2'>".$idtypedes."<br><a href='edit_visitor.php?id=$row[id]'>".$row['id_no']."</a></font></td>";
unset($idtypedes);
echo "<td><font face='times new roman' size='2'>".$row['gender']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['mobile']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['company_from']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['company_to']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['model']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['serial_no']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['vehicleplateno']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['status']."</font></td>";
if($row['status'] == 'IN'){
echo "<td><font face='times new roman' size='2'><a href='prtvstslp.php?vstid=$row[id]'>slip</a></font></td>";
echo "<td><font face='times new roman' size='2'><a href='prtvstag.php?vstid=$row[id]'>tag</a></font></td>";
} else { echo "<td></td><td></td>"; }
echo "<td></td></tr>";
}
?>	

                                </tbody>
                        </table>
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
