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
//$activeopen4 = "active open";
//$active2 = "active";
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






                <form class="form-horizontal" action="faq_edit.php" method="post">
<table border="0" class="table table-striped table-bordered table-hover ">
 <thead>
                                        

                                        <?php if ($_GET['id']){
        $_SESSION['faqid']=$_GET['id'];
        $faq= "SELECT * FROM faqs where faqid=".$_SESSION['faqid'];
        $resultset = mysql_query($faq); 
        while($row=mysql_fetch_array($resultset)){
                $_SESSION['faquestion']=$row['faquestion'];
                $_SESSION['faqanswer']=$row['faqanswer'];
        };
       
}?>
                                                
                                                <th>Question</th>
                                                <th>Answer</th>
<tr>
<td>
<div class="form-group">
<label>FAQ Question</label>
<input type="text" name="fquestion" id="fqn" value="<?php echo  $_SESSION['faquestion'];?> " required style="width: 500px;"/>
</div>
</td>

<td>
<div class="form-group">
<label>FAQ Answer</label>
<input type="text" name="fanswer" id="fan" value="<?php echo  $_SESSION['faqanswer'];?> " required style="width: 500px;"/>
</div>
</td>

</tr>
<tr>
<td>
<input type="submit" name="update" value="UPDATE" class="btn-primary" >

</td>
<td></td>
</tr>  
<       

</table>                                                
</form>


<?php


if($_POST['update']){

        
        $sql_update="update faqs set faquestion='$_POST[fquestion]',faqanswer='$_POST[fanswer]' where faqid='$_SESSION[faqid]'";
        $upd=mysql_query($sql_update);
        if($upd){

                
                //echo "successfully updated ";
                echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                echo "window.location.href='http://192.168.1.56/marine/faqs2.php'";
                echo "</script>";

        }else{
                echo "FAQ failed to update.Please contact support ";
                //echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                //echo "window.location.href='http://192.168.1.56/marine/faqs2.php'";
                //echo "</script>";

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
