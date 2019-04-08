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
$activeopen4 = "active open";
$active2 = "active";
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
                        <h3 class="header smaller lighter blue">Cargo Types</h3>
<form class="form-horizontal" action="" method="post">
<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom ">
<tr>
<td>
<div class="form-group">
<label>Cargo Category</label>
<select class="form-control" name="cargocat">
<?php
$cat = mysql_query("SELECT * FROM cargocat");
while($rowcat=mysql_fetch_array($cat)){
echo "<option value='$rowcat[catid]'>".$rowcat['category']."</option>";
}
?>
</select>
</div>
</td>
<td>
<div class="form-group">
<label>Cargo Type</label>
<input type="text" name="ctype" required >
</div>
</td>
<td>
<div class="form-group">
<label>Prem Rate</label>
<input type="number" name="crate"  step="any" required >
</div>
</td>

  
<td>
<div class="form-group">
<label>ICC</label>
 <select name="icc"  id="icc" required style="width: 160px;  ">
                                                                        <option value="">Select icc</option>
                                                                        <option value="A" >ICC(A)</option>
                                                                        <option value="B" >ICC(B)</option>
                                                                        <option value="C" >ICC(C)</option>
                                                                        <option value="Z" >ICC(Air)</option>
                                                                    </select>
</div>
</td>
</tr>
<tr>

<td>
<div class="form-group">
<label>Container</label>
 <select name="container"  id="container" required style="width: 160px;  ">
                                                                        <option value="">Select Cover</option>
                                                                        <option value="containerized" >containerized</option>
                                                                        <option value="non_containerized" >Non-containerized(B)</option>
                                                                        <option value="air" >Air</option>
                                                                        
                                                                    </select>
</div>
</td>

<td>
<div class="form-group">
<label>Excess</label>
<textarea name="excess" required></textarea>
</div>
</td>

<td>
<div class="form-group">
<label>clause</label>
<textarea name="clauses" required></textarea>
</div>
</td>

<td>
<div class="form-group">
<label>Cover</label>
<textarea name="cover" required></textarea>
</div>
</td>


</tr>







<td>
<input type="submit" name="Save" class="btn-primary">

</td>
</tr>
</table>						
</form>							
                        <div class="table-header">
                                Results for "Cargo Types"
                        </div>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th>Type Id</th>
                                                <th>Category</th>
                                                <th>Type</th>
						                                    <th>Prem Rate</th>
                                                <th>ICC</th>
                                                <th>Container</th>
                                                <th>Excess</th>
                                                <th>clause</th>
                                                <th>cover</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                        </tr>
                                </thead>

                                <tbody>


<?php
//submit form
if($_POST['Save']){  
//save
$sql_s="insert into cargotype( catid, ctype, crate, user,icc,container,excess,clauses,cover) VALUES (".$_POST[cargocat].",'".$_POST[ctype]."',".$_POST[crate].",".$user_id.",'".$_POST[icc]."','".$_POST[container]."','".$_POST[excess]."','".$_POST[clauses]."','".$_POST[cover]."'')";

$save = mysql_query($sql_s);
if($save){ //echo "saved"; } 
}
}

//display content
$cartype = mysql_query("SELECT * FROM cargotype ct JOIN cargocat cc ON (ct.catid=cc.catid) ORDER BY ct.ctypeid DESC");
while($row=mysql_fetch_array($cartype)){

echo "<tr>";
echo "<td>".$row['ctypeid']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td><font face='times new roman' size='2'>".$row['ctype']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['crate']."</font></td>";

echo "<td><font face='times new roman' size='2'>".$row['icc']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['container']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['excess']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['clauses']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['cover']."</font></td>";




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
null, null,null,null,
{ "bSortable": false }
] } );


//$('table td button:button').on('click' , function(){

$('#sample-table-2').on('click','td button:button', function(){
    
     var cargotype = $(this).closest('tr').find('td:eq(0)').text();
     var id = $(this).attr('name');
     var obj=$(this);
     if (id=='edt_btn'){
       
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        location.href=baseUrl+'/type_edit.php?ctypeid='+cargotype;

  

     }else if(id=='del_btn'){
         alert(cargotype);

         $.ajax({
                        url:"delete_cargo_type.php",
                        data:"ctype="+cargotype,
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
});

</script>

</body>
</html>
