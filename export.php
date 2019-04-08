<?php
session_start();
$user_id = $_SESSION['userid'];
$name = $_SESSION['fname'];
$adm = $_SESSION['admin'];


/**if(!$_SESSION['certno']){

            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
             
             echo "window.location.href = 'http://localhost/marine/gencert.php?set=1'";
            echo "</script>";



}
*/


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
$activeopen9 = "active open";
//$active7 = "active";
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
                <div id="pro">
                <form class="form-horizontal" action="export1.php" method="post" >
                        <table border="0" class="table table-striped table-bordered ">
                        <tr>
                        <td>
                        <div class="form-group">
                        <label>Period From</label>
                        <input type="date" name="periodfrom" required style="width: 150px;"/>
                        </div>

                        </td>
                        <td>
                        <div class="form-group">
                        <label>Period To</label>
                        <input type="date" name="periodto" required style="width: 150px;"/>
                        </div>

                        </td>

                        <td>
                        <div class="form-group">
                        <label>Function</label>
                        <input type="submit" class="btn-primary" name="upd_exc" id="upd_exc" value="EXPORT" class="btn-primary" >
                        </div>
                        </td>
                        </tr>
                        </table>                                                
                </form>     
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


    function close_bill(){
        alert('lll');
        $("#pro").hide();
    }

      function close_pro(){
        alert('lll');
        $("#bill").hide();
    }

$('#sample-table-2').on('click','td button:button', function(){
    
     var doc_id= $(this).closest('tr').find('td:eq(0)').text();
     var id = $(this).attr('name');
     var obj=$(this);
     if (id=='Delete'){
        alert('delete');


         $.ajax({
                        url:"delete_doc.php",
                        data:"doc_id="+doc_id,
                        type:"post",
                        success:function(resp){

                            obj.closest('tr').remove();
                        },
                        error:function(resp){
                            alert("Ooops..Something went wrong!!.Failed to delete row");
                        }


                    });
       
  

     }else if(id=='Download'){
         alert('download');



            
     }
});


</script>

</body>
</html>
