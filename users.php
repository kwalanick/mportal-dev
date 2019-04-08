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
$activeopen4 = "active open";
$active4 = "active";
include "sidebar.php"; 
?>

<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
<ul class="breadcrumb">
        <li class="active">Marine Portal</li>
</ul><!--.breadcrumb-->

<div class="nav-search" id="nav-search">
        
</div><!--#nav-search-->
</div>

<div class="page-content">
<div class="row-fluid">
        <div class="span12">
                <!--PAGE CONTENT BEGINS-->
<div class="row-fluid">
                        <h3 class="header smaller lighter blue">Users</h3>
                        <div id="divt" hidden>
<form class="form-horizontal" action="users.php" method="post" >
<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom ">
<tr>
<td>
<div class="form-group">
<label>First Name</label>
<input type="text" name="fname" required style="width: 205px;"/>
</div>
</td>
<td>
<div class="form-group">
<label>Second Name</label>
<input type="text" name="sname" required style="width: 205px;"/>
</div>
</td>



<td>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" required style="width: 205px;"/>
</div>
</td>
</tr>
<tr>
 <td>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" required style="width: 205px;"/>
</div>
</td>
<td>
<div class="form-group">
<label>ID Number</label>
<input type="number" name="id" required style="width: 205px;"/>
</div>
</td>
<td>
<div class="form-group">
<label>Phone Contact</label>
<input type="number" name="phone" required style="width: 205px;"/>
</div>
</td>

</tr>
<tr>
<td>
<div class="form-group">
<label>Telephone Contact</label>
<input type="number" name="telephone" style="width: 205px;"/>
</div>
</td>
<td>
<div class="form-group">
<label>Physical Address</label>
<input type="text" name="address" required style="width: 205px;"/>
</div>
</td>
<td>
<div class="form-group">
<label>Fax Number</label>
<input type="number" name="fax"  style="width: 205px;"/>
</div>
</td>
</tr>

</tr>
<tr>
<td>
<input type="submit" name="Add" class="btn-primary" >

</td>
</tr>
</table>						
</form>	
</div>
<div align="right" >
                        <button type="button" name="add" value="ADD NEW " id="add_user" class="btn-primary" onclick="show_f()">
                                 Add User
                        </button>						
                        <div class="table-header">
                                Results for "Users"
                        </div>



                        <div id="divupd" hidden>
                            
                        <form class="form-horizontal" action="users.php" method="post" name="updt_users" >
                                <table border="0" class="table table-striped table-bordered table-hover ">
                                <tr>
                                <td>
                                <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fnamed" id="fnamed" required style="width: 205px;"/>
                                </div>
                                </td>
                                    <td>
                                    <div class="form-group">
                                    <label>Second Name</label>
                                    <input type="text" name="snamed" id="snamed" required style="width: 205px;"/>
                                    </div>
                                    </td>

                                    <td hidden>
                                <div class="form-group">
                                <label>user id</label>
                                <input type="text" name="user_id" id="user_id" required style="width: 205px;"/>
                                </div>
                                </td>

                                
                               
                                 <td>
                                <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="emaild"  id="emaild" required style="width: 205px;"/>
                                </div>
                                </td>
                                 </tr>
                                <tr>
                                <td>
                                <div class="form-group">
                                <label>ID Number</label>
                                <input type="number" name="idd" id="idd" required style="width: 205px;"/>
                                </div>
                                </td>
                                <td>
                                <div class="form-group">
                                <label>Phone Contact</label>
                                <input type="number" name="phoned" id="phoned" required style="width: 205px;"/>
                                </div>
                                </td>

                                <td>
                                <div class="form-group">
                                <label>Telephone Number</label>
                                <input type="number" name="mobiled" id="mobiled" style="width: 205px;"/>
                                </div>
                                </td>

                                
                                </tr>
                                <tr>
                                
                                <td>
                                <div class="form-group">
                                <label>Physical Address</label>
                                <input type="text" name="addressd" id="addressd" required style="width: 205px;"/>
                                </div>
                                </td>
                                <td>
                                <div class="form-group">
                                <label>Pin Number</label>
                                <input type="text" name="pind" id="pind"  style="width: 205px;"/>
                                </div>
                                </td>

                                 <td>
                                <div class="form-group">
                                <label>Override Rate</label>
                                <input type="text" name="override_rated" id="override_rated"  style="width: 205px;"/>
                                </div>
                                </td>

                                </tr>
                                <tr>
                                <td>
                                <div class="form-group">
                                <label>ADMIN</label>
                                <select required class="form-control" name="shipmode" id="shipmode" style="width: 160px;">
                                    <option selected="selected">Select Mode</option>
                                    <option value="1">ADMINISTRATOR</option>
                                    <option value="0">STANDARD</option>
                                </select>
                                </div>
                                </td>
                                </tr>

                                </tr>
                                <tr>
                                <td>
                                <input type="submit" name="updt_users" class="btn-primary" value="UPDATE" >

                                </td>
                                </tr>
                                </table>                        
                            </form> 
                        </div>





                </div>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                
                                                <th>User ID</th>
                                                <th >Name</th>
                                                <th >Address</th>
                                                <th >Email</th>
                                                <th >ID No</th>
                                                <th >Mobile No</th>
                                                <th >Telephone_No</th>
                                                <th >Fax No</th>
                                                <th >Override Rate</th>
                                                <th>Priviledge</th>
                                                <th>Edit</th>
                                                <th>Function</th>
                                                
                                        </tr>
                                </thead>

                                <tbody>





<?php
$visit = "SELECT * FROM users ORDER BY fname ASC";
$visitsql = mysql_query($visit);
while($row=mysql_fetch_array($visitsql))
{

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';
}
else
{
   $bgcolor='#f1f1f1';
}
echo "<td>".$row['id']."</td>";
echo "<td>".$row['fname']." ".$row['sname']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['id_no']."</td>";
echo "<td>".$row['mobile_no']."</td>";
echo "<td>".$row['telephone_no']."</td>";
echo "<td>".$row['fax_no']."</td>";
echo "<td>".$row['override_rate']."</td>";
if($row['admin']==1)
{
 echo "<td>ADMINISTRATOR</td>";
}else
{
 echo "<td>STANDARD</td>";

}
 echo "<td ><button type=\"button\" size='5'  class=\"btn-info\" value=\"Edit\"  id=\"".$row['id']."\">Update</button></td>";

 $confirm_status = "SELECT * FROM users where id=".$row['id'];
 $status_state = mysql_query($confirm_status);
 $row_status=mysql_fetch_array($status_state);

 if($row_status['active']==1)
 {
    echo "<td ><button type=\"button\" size='5'  class=\"btn-danger\" value=\"Deactivate\"  id=\"".$row['id']."\">Disable</button></td>";
 }else
 {
    echo "<td ><button type=\"button\" size='5'  class=\"btn-warning\" value=\"Activate\"  id=\"".$row['id']."\">Activate</button></td>";
 }


 


echo "</tr>";
}
?>	

<?php

//form has been submitted to add new user
if ($_POST['updt_users'])
{

$encrypted=sha1($_POST['password']);

$sql_add="update users set fname='$_POST[fnamed]',
                           sname='$_POST[snamed]', 
                           address='$_POST[addressd]',
                           email='$_POST[emaild]',
                           mobile_no='$_POST[phoned]',
                           id_no='$_POST[idd]',
                           telephone_no='$_POST[mobiled]',
                           pin='$_POST[pind]',                       
                           admin='$_POST[shipmode]',
                           override_rate='$_POST[override_rated]' 
                where id='$_POST[user_id]' ";

$result=mysql_query($sql_add);





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

        show_f=function(){
              $("#divt").fadeIn("slow");  
        }

$( "#add" ).click(function() {
   
});

var oTable1 = $('#sample-table-2').dataTable( {
"aoColumns": [
{ "bSortable": false },
null, null,null, null, null,null,null,null,null,null,
{ "bSortable": false }
] } );


//$('table td button:button').on('click' , function(){

$('#sample-table-2').on('click','td button:button', function()
{
     
     var user_id = $(this).closest('tr').find('td:eq(0)').text();
     var text = $(this).text();
    
     if(text.trim()=='Activate'){
        alert('activete '+user_id);
        //var getUrl = window.location;
        //var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        //location.href=baseUrl+'/late_pay.php?cert_id='+cert_id;
        $.ajax({
                        url:"activate_user.php",
                        data:"user_id="+user_id,
                        type:"post",
                        success:function(resp){

                             var status=JSON.parse(resp);
                             if(status.STATUS==1){
                                alert('successfully activated'+user_id);
                             }

                             location.reload();
                            

                        },
                        error:function(resp){}

                    });

     }else if(text.trim()=='Disable') {

             alert('Deactivate '+user_id);
             $.ajax({
                        url:"deactivate_user.php",
                        data:"user_id="+user_id,
                        type:"post",
                        success:function(resp){

                             var status=JSON.parse(resp);
                             if(status.STATUS==1){
                                alert('successfully deactivated'+user_id);
                             }

                             location.reload();
                            

                        },
                        error:function(resp){}

                    });


     }
     else if(text.trim()=='Update')
     {

         //alert('update '+user_id);
          $.ajax({
                        url:"get_user_det.php",
                        data:"user="+user_id,
                        type:"post",
                        success:function(resp)
                        {
                             $("#divt").fadeOut("slow");  
                             $("#add_user").fadeOut("slow");
                             $("#sample-table-2").fadeOut("slow");
                             $("#divupd").fadeIn("slow");

                             var obj = JSON.parse(resp);


                             //alert(obj);
                             $("#fnamed").val(obj.FNAME);
                             $("#snamed").val(obj.SNAME);
                             $("#emaild").val(obj.EMAIL);
                             $("#idd").val(obj.ID);
                             $("#phoned").val(obj.MOBILE);
                             $("#mobiled").val(obj.TEL);
                             $("#addressd").val(obj.ADDRESS);
                             $("#pind").val(obj.PIN);
                             $("#override_rated").val(obj.RATE);                             
                             $("#shipmode").val(obj.ADMIN);                          
                             $("#user_id").val(user_id);
             
                         

                        },
                        error:function(resp)
                        {

                        }

                    });



     }
        

         

        //var getUrl = window.location;
        //var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        //location.href=baseUrl+'/marine_print.php?cert_id='+cert_id;       

     });

        

});

</script>

</body>
</html>
