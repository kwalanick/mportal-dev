<?php
session_start();

$now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
             //insret into logs
          $slog_sql="insert into loghist(user_id,login,logged,activity) values('$userid',now(),'Y','logout')";
          $slog = mysql_query($slog_sql);
          //unset($_COOKIE['certificate']);
          //setcookie('certificate', '', time() - 3600, '/');
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
$_SESSION['certno']=$_GET['certno'];

if($_GET['certno']){
setcookie($name, $_GET['certno'], time() + (86400), "/");
$_COOKIE[$name] = $_GET['certno'];
}

}

/*

if(!isset($_COOKIE['certno'])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
*/
/*if(!$_SESSION['certno']){

            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
             
            echo "window.location.href = 'gencert.php?set=1'";
            echo "</script>";



}*/



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
                
                <center><b>CURRENT CERTIFICATE</b></center>
                    <table id="sample-table-2" class="table   table-striped no-margin-bottom  ">
                                <thead>
                                        <tr>
                                                <th>CERT NO</th>
                                                <th>UCR</th>
                                                <th>Cargo Type</th>
                                                <th>Shipping Mode</th>
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
                                                 </tr>
                                </thead>

                                <tbody>


<?php
include 'connect.php';
$name=$_SESSION['fname']; 

$visit = "SELECT * FROM certificates where userid=".$_SESSION['userid']." and id=".$_COOKIE[$name];

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
echo "<td><a href=doc_upd?certno=".$row['id']." </a>".$row['id']."</td>";
//echo "<td><button type=\"button\" size='5' class=\"btn-info\"><a href=".$row['path']." Documents>View</a></button</td>";


$row_cat=mysql_fetch_array(mysql_query("select * from cargocat where catid=".$row['category']),MYSQL_ASSOC);
$category_name=$row_cat['category'];




echo "<td>".$row['ucr']."</td>";

echo "<td>".$cago_category."</td>";
echo "<td ><font face='times new roman' size='2'>".$row['shipping_mode']."</font></td>";
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
echo "</tr>";

}
?>  

                                </tbody>
                        </table>



               <br><br><br>



              <center><b>Please upload the required documents</b></center>


                <form class="form-horizontal" action="doc_upd.php" method="post" enctype="multipart/form-data">
                        <table border="0" class="table table-striped table-bordered ">
                        <tr>

                        <td>
                        <label>Certificate</label>
                        <input type="number" required readonly name="certno" value="<?php $name=$_SESSION['fname']; echo $_COOKIE[$name]    ?>" style="width: 200px;">
                        </td>



                        <td>
                         <label>Document</label>
                        <select required  name="document" id="document" style="width: 200px;">
                            <option value="PROFORMER INVOICE">PROFORMER INVOICE</option>
                            <option value="BILL OF LANDING">BILL OF LANDING</option>
                        </select>

                        </td>
                        
                        <td>
                         <label>Document Number</label>
                        <input type="number" required  name="doc_no" placeholder="Poformer/bill number" style="width: 200px;">

                        </td>



                        <td>
                       <label>PDF/WORD</label>
                        <input type="file" name="exc_upl" id="file_select"  required >
                        </div>
                        </td>
                        <td>
                        <input type="submit" class="btn-primary" name="upd_exc" id="upd_exc" value="UPLOAD" class="btn-primary" >
                        <div class="control-group">

                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>                                                
                </form>     
                </div>

                <center><button class="btn-primary"><a href="viewcert.php">Continue to payment</a></button></center>
                 <br><br><br>


                <div>
                    </form> 
                    <br>                    
                        <center><b>ATTACHED DOCUMENTS</b></center>

                        <table id="sample-table-2" class="table table-striped  table-hover">
                                <thead>
                                        <tr>
                                                
                        <th>Document ID</th>
                        <th>Document Name</th>
                        <th>Certificate Number</th>
                        <th>Document No</th>
                        <th>Function</th>
                        <th>Function</th>

                                        </tr>
                                </thead>

                                <tbody>
<?php
//display content SELECT * FROM certificates where userid=".$_SESSION['userid']." and id=".$_COOKIE[$name]
$docs = mysql_query("SELECT * FROM docs where user=".$_SESSION['userid']." and certno=".$_COOKIE[$name]." ORDER BY id ASC");
while($row=mysql_fetch_array($docs)){

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['document']."</td>";
echo "<td>".$row['certno']."</td>";
echo "<td>".$row['doc_no']."</td>";

echo "<td ><button type=\"button\" size='5' class=\"btn-primary\" name=\"Delete\"  id=\"".$row['id']."\">Delete</button></td>";
//echo "<td ><button type=\"button\" size='5' class=\"btn-warning\" name=\"Download\"  id=\"".$row['id']."\">Download</button></td>";
echo "<td><button type=\"button\" size='5' class=\"btn-info\"><a href=".$row['path']." download>Download</a></button</td>";

echo "</tr>";
}

?>


                        </tbody>
                        </table>
                        </form>
               
                </div>
    


<?php



if($_POST['upd_exc']){
         
if($_POST['certno']!=''){


$allowedMimeTypes = array( 
  'application/msword',
  'text/pdf',
  'application/pdf',
  'image/gif',
  'image/jpeg',
  'image/png'
);

$extension = end(explode(".", $_FILES["exc_upl"]["tmp_name"]));

if ( 20000000 < $_FILES["exc_upl"]["size"]  ) {
  die( 'Please provide a smaller file [E/1].' );
}

//if ( ! ( in_array($extension, $allowedExts ) ) ) {
  //die('Please provide another file type [E/2].');
//}

if ( in_array( $_FILES["exc_upl"]["type"], $allowedMimeTypes ) ) 
{      
 $path="docs/" .basename($_FILES["exc_upl"]["name"]);

 if (move_uploaded_file($_FILES["exc_upl"]["tmp_name"], "docs/" . $_FILES["exc_upl"]["name"])){

        include 'connect.php';
                $cert=$_POST['certno'];
                $sql_docs="insert into docs(certno,path,user,document,doc_no) values($cert,'$path','$_SESSION[userid]','$_POST[document]','$_POST[doc_no]')";
                $doc_insert=mysql_query($sql_docs);
                if($doc_insert){
                    
                    //echo " file uploaded successfully ".$_SESSION['count'];
                    echo '<meta http-equiv="refresh" content="0">';
                }

                $slog_sql="insert into loghist(user_id,login,logged,activity) values('$_SESSION[userid]',now(),'Y','uploaded document')";
                $slog = mysql_query($slog_sql);




  }
}
else
{
die('Please provide another file type [E/3].');
}
         
         

}else{
     echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "alert('Please select the certificate number in View Certificates')";
            echo "</script>";

}
}

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
