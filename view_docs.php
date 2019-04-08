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
<title><?php include "toptitle.php" ?></title>


<body>
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen4 = "active open";
$active9 = "active";
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
            </form>                     
                        
                        <table id="sample-table-2" class="table table-striped  table-hover">
                                <thead>
                                        <tr>
                                                
                        <th>Document ID</th>
                        <th>Document Name</th>
                        <th>Certificate No.</th>
                        <th>Function</th>
                        <th>Function</th>

                                        </tr>
                                </thead>

                                <tbody>
<?php
//display content
$docs = mysql_query("SELECT * FROM docs ORDER BY id ASC");
while($row=mysql_fetch_array($docs)){

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['document']."</td>";
echo "<td>".$row['certno']."</td>";

echo "<td ><button type=\"button\" size='5' class=\"btn-primary\" name=\"Delete\"  id=\"".$row['id']."\">Delete</button></td>";
//echo "<td ><button type=\"button\" size='5' class=\"btn-warning\" name=\"Download\"  id=\"".$row['id']."\">Download</button></td>";
echo "<td><button type=\"button\" size='5' class=\"btn-info\"><a href=".$row['path']." download>View</a></button</td>";

echo "</tr>";
}

?>






                        </tbody>
                        </table>
                        </form>







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
null, null,null,
{ "bSortable": false }
] } );


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

});
</script>


</body>
</html>
