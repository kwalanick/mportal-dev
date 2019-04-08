<?php
session_start();
$_SESSION['certificate']=$_GET['cert_id'];
$user_id = $_SESSION['userid'];
$name = $_SESSION['fname'];
$adm = $_SESSION['admin'];

include 'connect.php';
$slog_sql="insert into loghist(user_id,login,logged,activity) values('$userid',now(),'Y','printing certificate no $_GET[cert_id]')";
$slog = mysql_query($slog_sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php include "toptitle.php" ?>

<body >
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen1 = "active open";
//$active1 = "active";
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
                <button onclick="fnPrintArea()" id="Printer">Print</button>
                <div class="printthis">
                    <div id="print_this" style="font:Arial; size:2;">



                 <?php   
                 $sql="select * from certificates where id=".$_GET['cert_id'];
                 $res=mysql_fetch_array(mysql_query($sql));

                 $sql_doc="select * from docs where document like '%BILL OF LANDING%' and certno=".$res['id'];
                 $res_docs=mysql_fetch_array(mysql_query($sql_doc));

                 $sql_cargo="select * from cargotype where ctypeid=".$res['cargo_type'];
                 $res_cargo=mysql_fetch_array(mysql_query($sql_cargo));
                 ?>



                    <CENTER>

                    <strong><u>CERTIFICATE OF MARINE INSURANCE</u><br>
                    INSURER:AFRICA MERCHANT ASSURANCE COMPANY LTD</strong>
                   <table border="2px" width="90%" height="900">
                   <tr>
                   <td><b>AGENCY</b></td>
                   <td><?php echo "Direct";?></td>
                   </tr>  
                   <tr>
                   <td><b>INSURED</b></td>
                   <td><?php echo $res['owner']; ?></td>
                   </tr>
                   <tr>
                   <td><b>POLICY NUMBER</b></td>
                   <td><?php echo $res['policy_no']; ?></td>
                   </tr>                      
                   <tr>
                   <td><b>CLASS OF INSURANCE</b></td>
                     <td>Marine Cargo</td>
                   </tr>
                   <tr>
                   <td><b>PERIOD OF INSURANCE</b></td>
                     <td><?php echo "From ".$res['p_from']." To ".$res['p_to']; ?></td>
                   </tr>
                   <tr>
                   <td><b>BILL OF LADINNG #</b></td>
                   <td><?php echo $res_docs['doc_no']; ?></td>
                   </tr>
                   <tr>
                   <td><b>CERTIFICATE #</b></td>
                   <td><?php echo $res['id']; ?></td>
                   </tr>
                   <tr>
                   <td><b>VOYAGE</b></td>
                   <td><?php echo $res['shipping_mode']; ?></td>
                   </tr>
                   <tr>
                   <td><b>SUM INSURED</b></td>
                   <td><?php echo $res['sum_insured']; ?></td>
                   </tr>
                   <tr>
                   <td><b>INTERESTS</b></td>
                   <td><?php echo  $res_cargo['ctype'];    ?></td>
                   </tr>
                   <tr>
                   <td><b>COVER PROVIDED</b></td>
                   <td><?php echo $res_cargo['cover']; ?></td>
                   </tr>
                   <tr>
                   <td><b>EXCESS</b></td>
                   <td><?php echo $res_cargo['excess']; ?></td>
                   </tr>
                   <tr>
                   <td><b>SPECIAL CLAUSES</b></td>
                    <td><?php echo $res_cargo['clauses']; ?></td>
                   </tr>
                   <tr>
                   <td><b>NOTICE OF LOSS</b></td>
                   <td>Any event that might lead to a claim under the policy must be notified to the insurers <br> immediately and in any case within fourteen days of the happening of the event</td>
                   </tr>
                   
                   </table>
                  
                   

                   </CENTER>
                    <!--<div style="margin-left: 28%;">
                    Name:Maxwell Munene
                   <br>
                   Signature:<img src="images/sign.jpg" width="80px" height="80px"><br>
                   Authorized official of the company
                    </div>-->
             
                        
                        
                    </div>
                </div>











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


    function fnPrintArea()
{
var DocumentContainer = document.getElementById('print_this');
var WindowObject = window.open('', "printarea", 
"width=850,height=850,top=200,left=250,toolbars=no,scrollbars=yes,status=no,resizable=no");
    WindowObject.document.writeln('<!DOCTYPE html>');
    WindowObject.document.writeln('<html><head><title></title>');
    WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="styles.css" media="print">');
    WindowObject.document.writeln('<style type="text/css">body{ background:#FFF;}table{font-family:Arial;font-size:9px;line-height:12px;} </style>');
    WindowObject.document.writeln('</head><body>');
WindowObject.document.writeln(DocumentContainer.innerHTML);
    WindowObject.document.writeln('</body></html>');
WindowObject.document.close();
WindowObject.focus();
WindowObject.print();
WindowObject.close();
}



            

        


    </script>




</body>
</html>
