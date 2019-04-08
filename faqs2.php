





<?php
session_start();
//check if the session has expired
$now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
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
$activeopen4="active open";
$active6 = "active open";

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

<!--Start div content faqs.php -->

<center>
<h3 class="smaller lighter blue"><font size="+1"><u><b>Add New FAQ</b></u></font></h3>
<form action="" method="post">
  <div style="width: 50%;">
    <table class="table table-bordered table-striped">
    <tr>
    <th>Question:<br><textarea name="faquest" rows="4" cols="30" required></textarea></th>
    <th>Answer:<br><textarea name="faqans" rows="4" cols="40" required></textarea></th>
    <th><br/><br/><input type="submit" class="btn-primary" name="save" value="save"></th>
    </tr>
    </table>
    </div>
</form>
<hr width="80%" />

    <?php
    if($_POST['save']){
    //check for duplicates
    $faqdup = mysql_num_rows(mysql_query("SELECT * FROM faqs WHERE faquestion='$_POST[faquest]' AND faqanswer='$_POST[faqans]'"));
        if($faqdup > 0){
            echo "<font color='red'>FAQ ALREADY SUBMITTED!</font>"; }
        else{
           $qry="INSERT INTO faqs(faquestion,faqanswer,faqdate,creator) VALUES ('$_POST[faquest]','$_POST[faqans]',CURDATE(),$_SESSION[userid])";
            $faqinst = mysql_query($qry);
            if($faqinst){ 
                echo "Successfully saved!"; 
            }
            else { 
                echo "Failed to save!"; }
            }
    }
    ?>
    
    <div id="propfr">
        <div class="printthis">
            <div id="print_this">
            <div class="table-header">
                <center><font size="+1"><b><u>Frequently Asked Questions</u></b></font></center>
            </div>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th>ID</th><th>Question</th><th>Answer</th><th>Date created</th><th>Edit</th><th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if($_POST['sort']){
    $sear = $_POST['search'];
    $sopt = $_POST['option'];
        $faqsql = mysql_query("SELECT * FROM faqs WHERE $sear LIKE '%$sopt%' ORDER BY faqid DESC");
    }
    else{
    $faqsql = mysql_query("SELECT * FROM faqs ORDER BY faqid DESC");
    }
    while($faqrow=mysql_fetch_array($faqsql)){
        if($bgcolor==$color1){$bgcolor=$color2;}
        else{$bgcolor=$color1;}

        echo "<tr>";
        echo "<td>".$faqrow['faqid']."</td>";
        echo "<td>".$faqrow['faquestion']."</td>";
        echo "<td>".$faqrow['faqanswer']."</td>";
        echo "<td>".$faqrow['faqdate']."</td>";
        echo "<td><button type='button' value='Edit' name='edt_btn' class='btn-primary'>Edit</button></td>";
        echo "<td><button type='button' value='Delete' name='del_btn' class='btn-danger'>Delete</button></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</center>

</div>

<!--End div content faqs.php -->









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
null, null,null, null,    
{ "bSortable": false }
] } );



//$('table td button:button').on('click' , function(){

$('#sample-table-2').on('click','td button:button', function(){
    
     var faqid = $(this).closest('tr').find('td:eq(0)').text();
     var id = $(this).attr('name');
     var obj=$(this);
     if (id=='edt_btn'){
       
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        location.href=baseUrl+'/faq_edit.php?id='+faqid;

  

     }else if(id=='del_btn'){
         alert('delete row');

         $.ajax({
                        url:"delete_faq.php",
                        data:"id="+faqid,
                        type:"post",
                        success:function(resp){

                            obj.closest('tr').remove();
                        },
                        error:function(resp){
                            alert("Ooops..Something went wrong!!.Failed to delete row");
                        }


                    });





         
     }
     
       


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






































