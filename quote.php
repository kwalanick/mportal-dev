<?php
/*
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
        */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php include "toptitle.php" ?>

<body ng-app="app" ng-controller="mainCtrl">
<?php include "navbar_pass.php"; ?>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
<span class="menu-text"></span>
</a>

<?php 
$activeopen1 = "active open";
//$active1 = "active";
//include "sidebar.php"; 
 include "sidebar_pmp.php";
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
                        <h3 class="header smaller lighter blue">Generate Marine Certificate</h3>
<form class="form-horizontal" action="" method="post">
<table border="0" class="table  table-bordered table-hover no-margin-bottom ">
<tr><td>
<div class="form-group">
<label>Product</label>
<select class="form-control" name="product" style="width: 220px;">
<option>MARINE CARGO - ALL RISKS</option>
</select>
</div>
</td>
<td>

<div class="form-group">
<label>Intermediary</label>
<!--<input type="text" name="agent" value="" readonly />-->
<select name="agent" style="width: 160px; ">
    <option selected>DIRECT</option>
</select>
</div>
</td>


<td>

<div class="form-group">
<label>Cover</label>
<!--<input type="text" name="agent" value="" readonly />-->
<select name="cover" style="width: 205px; ">
    <option selected>COMPREHENSIVE</option>

</select>
</div>
</td>


</tr>
<tr>
<td>
<div class="form-group">
<label>Cargo Category</label>
<select required class="form-control" name="cargocat" id="cargocat" style="width: 220px;">
<option selected="selected">Select Category</option>
<?php
$cat = mysql_query("SELECT * FROM cargocat");
while($rowcat=mysql_fetch_array($cat)){
echo "<option value='".$rowcat['catid']."'>".$rowcat['category']."</option>";
}
?>
</select>
</div>
</td>
<td>
<div class="form-group">
<label>Cargo Type</label>
<select required class="form-control" ng-model="crate" name="cargotype" id="cargotype" style="width: 160px;">

</select>
</div>
</td>

<td hidden>
<div class="form-group">
<label>Cwdawdawe</label>

<select class="form-control"  name="cargotype1" id="cargotype1" style="width: 160px;">

</select>
</div>
</td>





<!--<td>
<div class="form-group">
<label>Shipping Mode</label>
<select required class="form-control" name="shipmode" id="shipmode" style="width: 160px;">
<option selected="selected">Select Mode</option>
<option value="Sea">Sea</option>
<option value="Air">Air</option>
</select>
</div>
</td>-->

<td>
<div class="form-group">
<label>Sum Insured</label>
<input type="text" name="suminsured" id="sum_insured" ng-model="sum_insured" style="width: 205px;" required />
</div>
</td>
<tr>



<td>
<div class="form-group">
<label>Stamp Duty</label>
<input type="number" step="any" readonly name="stamp" id="stamp" style="width: 205px;"/>
</div>
</td>
<td>
<div class="form-group">
<label>Training Levy</label>
<input type="number" step="any "     readonly name="training" id="training" style="width: 150px;"/>
</div>
</td>

<td>
<div class="form-group">
<label>Policy Fund</label>
<input type="number" step="any"   readonly name="fund" id="fund" style="width: 205px;"/>
</div>
</td>

</tr>
<tr>

<td>
  <div class="form-group">
<label>War Premium</label>
<input type="text" name="war_prem" id="war_prem"  readonly style="width: 205px;"/ >
</div>      
</td>

<td>
  <div class="form-group">
<label>Basic Premium</label>
<input type="text" name="premium" id="premium"  readonly style="width: 150px;"/ >
</div>      
</td>
<td>
 <div class="form-group">
<label>Total Premium</label>
<input type="text" name="tpremium" id="tpremium"  readonly style="width: 205px;"/ >
</div>      
</td>
</tr>
<tr>

<td>
<input type="submit" name="submit" class="btn btn-primary button-loading" value="Register to Continue" data-loading-text="Loading...">
<div class="control-group">
</td>
<td></td>
<td></td>
</tr>
</div>
</table>
</form>		

<?php
if($_POST['submit']){ 
    include "connect.php";

        //$row_cargo=mysql_fetch_array(mysql_query("select category from cargocat where catid=".$_POST['cargocat']),MYSQL_ASSOC);
        //echo $cago_category=$row_cargo['category'];

        //insert actual names of origin country
        $sql_actual="select * from country where id=".$_POST['origincountry'];
        $row_actual=mysql_query($sql_actual);
        $actual_country=mysql_fetch_array($row_actual);
        $actual_country['name'];

        //actual name of destination country
        $sql_actual1="select * from country where id=".$_POST['destcountry'];
        $row_actual1=mysql_query($sql_actual1);
        $actual_dest=mysql_fetch_array($row_actual1);
        $actual_dest['name'];




    
        // $sql= "insert into certificates_tmp(`category`, `cargo_type`, `shipping_mode`, `package_type`, `shp_cover_type`, `sum_insured`, `country_orig`, `country_dest`, `city_orig`, `city_dest`, `email`, `p_from`, `p_to`, `premium`,`Total_premium`,`vessel`,`vessel_no`) values(".$_POST['cargocat'].",".$_POST['cargotype1'].",'".$_POST['shipmode']."','".$_POST['product']."','".$_POST['shipcover']."',".$_POST['suminsured'].",'".$actual_country['name']."','".$actual_dest['name']."','".$_POST['cityorigin']."','".$_POST['citydestination']."','".$_POST['email']."','".$_POST['periodfrom']."','".$_POST['periodto']."','".$_POST['premium']."','".$_POST['tpremium']."','".$_POST['vname']. "','".$_POST['vnumber']. "')";

        //$add_certificate = mysql_query($sql);
        


            //$slog_sql="insert into loghist(user_id,login,logged,activity) values('$_SESSION[userid]',now(),'Y','generated certificate')";
           // $slog = mysql_query($slog_sql);
            
            //$latest = mysql_query("SELECT * FROM certificates order by id desc limit 1");
            //$row_latest=mysql_fetch_array($latest);
            //$id_latest=$row_latest['id'];
            


            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "window.location.href = 'index.php'";
            echo "</script>";

            //header('http://localhost/marine/viewcert.php')

        }



?>				
                        <!--<div class="table-header">
                                Results for "Visitors"
                        </div>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th class="center">
                                                        <label>
                                                                <input type="checkbox" />
                                                                <span class="lbl"></span>
                                                        </label>
                                                </th>
                                                <th>Slip No.</th>
                                                <th>Image</th>
                                                <th class="hidden-480">Name</th>
                                                <th class="hidden-phone">ID_NO</th>
                                                <th class="hidden-480">Gender</th>
                                                <th class="hidden-phone">Mobile_No</th>
                                                <th class="hidden-480">Company_From</th>
                                                <th class="hidden-480">Company_To</th>
                                                <th class="hidden-480">Model</th>
                                                <th class="hidden-480">Serial_NO</th>
                                                <th class="hidden-480">Vehicle</th>
                                                <th class="hidden-480">Status</th>
                                                <th class="hidden-480"></th>
                                                <th class="hidden-480"></th>
                                                <th></th>
                                        </tr>
                                </thead>

                                <tbody>


<?php
$visit = "SELECT * FROM visitors ORDER BY id DESC";
$visitsql = mysql_query($visit);
while($row=mysql_fetch_array($visitsql)){

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}

echo "<tr bgcolor=$bgcolor>";
echo "<td class='center'>
<label>
<input type='checkbox' />
<span class='lbl'></span>
</label>
</td>";
echo "<td>".$row['id']."</td>";
echo "<td></td></tr>";
}
?>	

                                </tbody>
                        </table>
                </div>-->




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

<!--angular scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angucomplete-alt/2.4.1/angucomplete-alt.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-cookies.js"></script>
<script type="text/javascript">
    
    var app = angular.module('app', ['angucomplete-alt']);
    app.controller('mainCtrl', function($scope) {
    $scope.sum_insured=0;
    $scope.crate=0;
    $scope.stamp=0;
    //$scope.training=0;//;
    //$scope.fund=0;//;

    

});


</script>

<!--ace scripts-->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!--inline scripts related to this page-->



    <script type="text/javascript">

        jQuery(document).ready(function()
        {
           //var today = new Date().toISOString().split('T')[0];
           //document.getElementsByName("periodfrom")[0].setAttribute('min', today);
           //document.getElementsByName("periodto")[0].setAttribute('min', today);



          $(document).on('keyup', '#sum_insured', function() {
                //alert('key up');
            
            
            var rate=$("select#cargotype option:selected").attr('value');
            var sum_insured=$("#sum_insured").val();
            var fund,training,stamp,war;

            $.ajax({
                        url:"get_const.php",
                        type:"post",
                        success:function(resp){
                        var obj = JSON.parse(resp);
                        stamp=obj.STAMP;
                        fund=obj.FUND;
                        training=obj.TRAINING;
                        war=obj.WAR;
                         //alert(stamp+" "+fund+" "+training);
                        var nwfund=(fund*sum_insured)/100;
                        var nwtraining=(training*sum_insured)/100;
                        var nwstamp=(stamp*sum_insured)/100;
                        var nwwar=(war*sum_insured)/100;
                        var premium=((rate*sum_insured)/100);
                        $("#fund").val(Math.ceil(nwfund));
                        $("#stamp").val(Math.ceil(nwstamp));
                        $("#training").val(Math.ceil(nwtraining));
                        $("#war_prem").val(Math.ceil(nwwar));
                        $("#premium").val(Math.ceil(premium));
                        $("#tpremium").val(Math.ceil(premium+nwstamp+nwtraining+nwfund+nwwar));


                            
                        },
                        error:function(resp){}

                    });

         



            

            //alert("stamp "+stamp);
            //alert("training "+training);
            //alert("fund "+fund);
            //alert("premium "+premium);



            });

            $("select#cargocat").change(function()
            {
                var cargo_cat=$("select#cargocat option:selected").attr('value');
                //alert(cargo_cat);
        

                    $.ajax({
                        url:"get_cargo_type.php",
                        data:"categ="+cargo_cat,
                        type:"post",
                        success:function(resp){
                            $("select#cargotype").html(resp);
                             $.ajax({
                                url:"get_cargo_type1.php",
                                data:"categ="+cargo_cat,
                                type:"post",
                                success:function(resp){
                                    $("select#cargotype1").html(resp);

                                    
                                },
                                error:function(resp){}

                            });
            


                        },
                        error:function(resp){}

                    });
            

            });


          //country of origin
          $("select#origincountry").change(function()
            {
                var country=$("select#origincountry option:selected").attr('value');
                //alert(country);
        

                    $.ajax({
                        url:"get_city.php",
                        data:"id="+country,
                        type:"post",
                        success:function(resp){
                            $("select#cityorigin").html(resp);
                        },
                        error:function(resp){}

                    });
            

            });

          //destination country

          $("select#destcountry").change(function()
            {
                var country=$("select#destcountry option:selected").attr('value');
                //alert(country);
        

                    $.ajax({
                        url:"get_city_dest.php",
                        data:"id="+country,
                        type:"post",
                        success:function(resp){
                            $("select#citydestination").html(resp);
                        },
                        error:function(resp){}

                    });
            

            });






            $("select#shipmode").change(function()
            {
                var ship_mod=$("select#shipmode option:selected").attr('value');
               // alert(ship_mod);

                if(ship_mod=='Sea'){
                        var options='';
                        options += '<option selected value="Containerized">Containerized</option>';
                         options += '<option selected value="Non-Containerized">Non-Containerized</option>';
                        $("select#product").html(options);
           
           

                }else{
                         var options='';
                        options += '<option selected value="Containerized">Non-Containerized</option>';
                        $("select#product").html(options);



                }
            
            
            });

            

        });


    </script>
    <script type="text/javascript">
$(function() {
var oTable1 = $('#sample-table-2').dataTable( {
"aoColumns": [
{ "bSortable": false },
null, null,null, null, null,null, null, null,null, null, null,null,null,null,   
{ "bSortable": false }
] } );


$('table th input:checkbox').on('click' , function(){
var that = this;
$(this).closest('table').find('tr > td:first-child input:checkbox')
.each(function(){
        this.checked = that.checked;
        $(this).closest('tr').toggleClass('selected');
});

});


$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
function tooltip_placement(context, source) {
var $source = $(source);
var $parent = $source.closest('table')
var off1 = $parent.offset();
var w1 = $parent.width();

var off2 = $source.offset();
var w2 = $source.width();

if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
return 'left';
}
});
</script>




</body>
</html>
