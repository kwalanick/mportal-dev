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
<title><?php include "toptitle.php" ?></title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
</head>

<body>
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen4 = "active open";
$active3 = "active";
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
                        <h3 class="header smaller lighter blue">New Clause</h3>
<form class="form-horizontal" action="" method="post">
<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom ">
<tr>
<td>
<div class="form-group">
<label>Clauses</label>
<input type="text" name="terms" required >
</div>
</td>

<td>
<input type="submit" name="submit" value="Save" >
<div class="control-group">

</div>
</td>
</tr>
</table>						
</form>						
                        
                        <table id="sample-table-2" class="table table-striped  table-hover">
                                <thead>
                                        <tr>
                                                
                                                <th>Clause No</th>
                                                <th>Clause</th>
						<th>Function</th>
                        <th>Function</th>

                                        </tr>
                                </thead>

                                <tbody>


<?php
//submit form
if($_POST['submit']){ echo "submit pressed".$user_id; 
//save
$save = mysql_query("INSERT INTO terms (termcondition,user) VALUES('$_POST[terms]','$user_id')");
if($save){ echo "saved"; }
}

//display content
$terms = mysql_query("SELECT * FROM terms ORDER BY termcondition ASC");
while($row=mysql_fetch_array($terms)){

echo "<tr>";
echo "<td>".$row['termid']."</td>";
echo "<td>".$row['termcondition']."</td>";
echo "<td ><button type=\"button\" size='5' class=\"btn-primary\" value=\"Update\"  id=\"".$row['termid']."\">Update</button></td>";
echo "<td ><button type=\"button\" size='5' class=\"btn-warning\" value=\"Delete\"  id=\"".$row['termid']."\">Delete</button></td>";

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



<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/dataTables.material.min.js"></script>

<!--page specific plugin scripts-->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

<!--ace scripts-->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!--inline scripts related to this page-->
<script type="text/javascript">
$(function() {



$('#sample-table-2').on('click','td button:button', function(){
    
     var termid = $(this).closest('tr').find('td:eq(0)').text();
     var id = $(this).attr('value');
     var obj=$(this);
     if (id=='Update'){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        location.href=baseUrl+'/term_upd.php?id='+term_id;    

  

     }else if(id=='Delete'){
        alert('delete row');

         $.ajax({
                        url:"delete_term.php",
                        data:"termid="+termid,
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
