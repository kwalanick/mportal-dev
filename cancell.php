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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>


<body>
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen5 = "active open";
//$active3 = "active";
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
                        <h3 class="header smaller lighter blue">Marine Certificates</h3>
                        
                                                        </div>
                        <table id="sample-table-2" class="table   table-striped no-margin-bottom  ">
                                <thead>
                                        <tr>
                                                <th>Cert No</th>
                                                <th>Policy No</th>
                                                <!--<th>Category</th>-->
                                                <th>Cargo Type</th>
                                               <!-- <th>Shipping Mode</th>-->
                                               <!-- <th >Package Type</th>-->
                                               <!-- <th >Cover Type</th>-->
                                                <th >Sum Insured</th>
                                                <th >Source</th>
                                                <th >Destination</th>
                                                <!--<th >City From</th>
                                                <th >City To</th>-->
                                                
                                                <th >Period From</th>
                                                <th >Period To</th>
                                                <!--<th >PIN</th>-->
                                                <th >Premium</th>
                                                <!--<th >Paid Amount</th>-->

                                                <th>Function</th>
                                              
                                                <?php 
                                                   $admin = mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
                                                   $row_adm=mysql_fetch_array($admin);

                                                   if($row_adm['admin']==1){
                                                    $_SESSION['admin']=1;

                                                   
                                                    //echo "<th>Function</th>";

                                                   }


                                                 ?>
                                                
                                                 
                                                
                                        </tr>
                                </thead>

                                <tbody>


<?php
if($_SESSION['admin']==1){
    $visit = "SELECT * FROM certificates  ORDER BY id desc";

}else{
    $visit = "SELECT * FROM certificates where userid=".$_SESSION['userid']." ORDER BY id desc";

}

$visitsql = mysql_query($visit);
$count=1;
while($row=mysql_fetch_array($visitsql)){

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}


$row_cargo=mysql_fetch_array(mysql_query("select * from cargotype where ctypeid=".$row['cargo_type']),MYSQL_ASSOC);
$cago_category=$row_cargo['ctype'];


echo "<tr >";
//echo "<td><font face='times new roman' size='2'>".$row['id']."</font></td>";
//echo "<td>".$row['id']."</td>";
echo "<td><a href=doc_upd.php?certno=".$row['id']." </a>".$row['id']."</td>";
//echo "<td><button type=\"button\" size='5' class=\"btn-info\"><a href=".$row['path']." Documents>View</a></button</td>";

echo "<td><a href=doc_upd.php?certno= </a></td>";



$row_cat=mysql_fetch_array(mysql_query("select * from cargocat where catid=".$row['category']),MYSQL_ASSOC);
$category_name=$row_cat['category'];




//echo "<td>".$category_name."</td>";

echo "<td>".$cago_category."</td>";
//echo "<td ><font face='times new roman' size='2'>".$row['shipping_mode']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['package_type']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['shp_cover_type']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['sum_insured']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['country_orig']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['country_dest']."</font></td>";

//echo "<td><font face='times new roman' size='2'>".$row['city_orig']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['city_dest']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['owner']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['email']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['mobile']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['p_from']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['p_to']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['pin']."</font></td>";
echo "<td><font face='times new roman' size='2'>".$row['Total_premium']."</font></td>";
//echo "<td><font face='times new roman' size='2'>".$row['amount']."</font></td>";


      if(trim($row['cancellation'])=='N'){

          echo "<td ><button type=\"button\" size='5' class=\"btn-info\" value=\"Cancel\"  id=\"".$row['id']."\">Cancel</button></td>";

      }else{

         echo "<td ><button type=\"button\" disabled  size='5' class=\"btn-default\" value=\"Cancel\"  id=\"".$row['id']."\">Cancelled</button></td>";


      }

  
    







//echo "<td></td>";

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

<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/dataTables.material.min.js"></script>

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
<script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>

<!--inline scripts related to this page-->
<script type="text/javascript">
$(function() {
    var oTable1 = $('#sample-table-2').dataTable( {
   "aaSorting": [[ 0, "desc" ]]       
} );


//$('table td button:button').on('click' , function(){
$('#sample-table-2').on('click','td button:button', function(){
     
     var cert_id = $(this).closest('tr').find('td:eq(0)').text();
     var button_text = $(this).text();
    
     if(button_text.trim()=='Pay'){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        location.href=baseUrl+'/late_pay.php?cert_id='+cert_id;

     }else if(button_text.trim()=='Cancel'){

        //alert('declare');
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

         $.ajax({
                        url:"dec_cancel.php",
                        data:"id="+cert_id,
                        type:"post",
                        success:function(resp){

                           var obj = JSON.parse(resp);
                                    //alert(obj.response);
                            if(obj.response==1){
                               alert('Cancellation declared to Kentrade');
                            }else{
                              alert('Failed to submit termination declaration to Kentrade');

                            }
                           
                            location.reload();
                         //$( "#sample-table-2" ).load( "viewcert.html #sample-table-2");

                          
                          //location.href=baseUrl+'/viewcert.php';
                                               // }
                            //obj.closest('tr').remove();
                        },
                        error:function(resp){
                            alert("Ooops..Something went wrong!!.Failed to issue termination row");
                        }


                    });





     }

        

});



})
</script>

</body>
</html>
