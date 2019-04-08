<?php
session_start();
//check if the session has expired
$now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
             //insret into logs
          $slog_sql="insert into loghist(user_id,login,logged,activity) values('$userid',now(),'Y','logout')";
          $slog = mysql_query($slog_sql);
            session_destroy();
            
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "window.location = \"index.php\";";
            //echo "Your session has expired!Please Login to continue";
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>

</title>
</head>

<body>
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen4 = "active open";
$active1 = "active";
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
<div class="row-fluid">
                        <h3 class="header smaller lighter blue">Cargo Categories</h3>
<form class="form-horizontal" action="cargocat.php" method="post">
<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
<tr>
<td>
<div class="form-group">
<label>Cargo Category</label>
<input type="text" name="cargocat" required >
</div>
</td>
<td>
<input type="submit" name="Save" class="btn-primary" >
<div class="control-group">

</div>
</div>
</td>
</tr>
</table>						
</form>						
                        <div class="table-header">
                                Results for "Cargo Categories"
                        </div>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th>Category Id</th>
                                                <th>Category</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                        </tr>
                                </thead>

                                <tbody>


<?php
//submit form
if($_POST['Save']){ echo "submit pressed".$user_id; 
//save
$save = mysql_query("INSERT INTO cargocat (category,user) VALUES('$_POST[cargocat]','$user_id')");
if($save){ echo "saved"; }
}

//display content
$visit = "SELECT * FROM cargocat ORDER BY catid DESC";
$visitsql = mysql_query($visit);
while($row=mysql_fetch_array($visitsql)){

echo "<tr bgcolor=$bgcolor>";
echo "<td>".$row['catid']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td><button type='button' value='Edit' name='edt_btn' class='btn-primary'>Edit</button></td>";
echo "<td><button type='button' value='Delete' name='del_btn' class='btn-danger'>Delete</button></td>";

echo "</tr>";
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
null, null, 
{ "bSortable": false }
] } );


//$('table td button:button').on('click' , function(){

$('#sample-table-2').on('click','td button:button', function(){
    
     var cargocat = $(this).closest('tr').find('td:eq(0)').text();
     var id = $(this).attr('name');
     var obj=$(this);
     if (id=='edt_btn'){
        //alert('update row');
       
        
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        location.href=baseUrl+'/cat_edit.php?catid='+cargocat;

  

     }else if(id=='del_btn'){
        // alert('delete row');

         $.ajax({
                        url:"delete_cargo_cat.php",
                        data:"catid="+cargocat,
                        type:"post",
                        success:function(resp){
                             //alert(resp);
                            obj.closest('tr').remove();
                        },
                        error:function(resp){
                            alert("Ooops..Something went wrong!!.Failed to delete row");
                        }


                    });





         
     }
       


});

});

</script>

</body>
</html>
