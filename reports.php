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

 

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>

 





<body>
<?php include "navbar.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen3 = "active open";
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
                        <h3 class="header smaller lighter blue">Generate Reports</h3>
                        
                                                        </div>

                         <!--<div align="left">
                          <button onclick="fnPrintArea()" id="Printer" class="btn-info" style=" width: 10em;  height: 3em;" id='later'>Print Report</button>

                        </div>-->
                        <br>
                        <br>

                        <div id="print_this">

                        <table id="sample-table-2" class="table table-striped ">
                                <thead>
                                        <tr>
                                                <th>ID</th>
                                                <!--<th>Category</th>-->
                                                <th>Cargo Type</th>
                                                <!--<th>Shipping Mode</th>
                                                <th >Package Type</th>-->
                                                <th >Cover Type</th>
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
$visit = "SELECT * FROM certificates where userid=".$_SESSION['userid']." ORDER BY id ";
$visitsql = mysql_query($visit);
while($row=mysql_fetch_array($visitsql)){

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}


echo "<tr>";
echo "<td><font face='times new roman' size='2'>".$row['id']."</font></td>";

$row_cat=mysql_fetch_array(mysql_query("select * from cargotype where ctypeid=".$row['cargo_type']),MYSQL_ASSOC);
$category_name=$row_cat['ctype'];


//echo "<td>".$category_name."</td>";
echo  "<td>".$category_name."</td>";
echo "<td><font face='times new roman' size='2'>".$row['shipping_mode']."</font></td>";
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
echo "<td><font face='times new roman' size='2'>".$row['premium']."</font></td>";
//echo "<td ><button type=\"button\" size='5' class=\"btn-primary\" value=\"Print\"  id=\"".$row['id']."\">Print</button></td>";
//echo "<td></td>";

echo "</tr>";

}
?>      

                                </tbody>
                        </table>
                        </div>
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

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->


<!--<![endif]-->

<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


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

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/pdfmake-0.1.18/b-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/datatables.min.js"></script>





<!--ace scripts-->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>


<!--inline scripts related to this page-->
<script type="text/javascript">
$(function() {
    var oTable1 = $('#sample-table-2').dataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ],
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
 } );



$('table td button:button').on('click' , function(){
     
     var cert_id = $(this).closest('tr').find('td:eq(0)').text();
     //alert(myValue2);

        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        location.href=baseUrl+'/marine_print.php?cert_id='+cert_id;    


});



})
</script>
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
