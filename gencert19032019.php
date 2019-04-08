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

            include 'connect.php';

          $user_id = $_SESSION['userid'];
          $name = $_SESSION['fname'];
          $adm = $_SESSION['admin'];
          $sql_ag="SELECT * FROM users where id=".$_SESSION['userid'];

           $user_ag = mysql_query($sql_ag);
            $row_ag=mysql_fetch_array($user_ag);
                    $mail_ag=$row_ag['email'];

                    $user_confirm_ag=mysql_query("select * from agmnf where email='".$mail_ag."'");
                    $user_confirm_rows=mysql_num_rows($user_confirm_ag);
                    $user_agnt_row=mysql_fetch_array($user_confirm_ag);

                    if($user_confirm_rows > 0){

                    $_SESSION['agent']=$user_agnt_row['agent'];

                    }else{
                         $_SESSION['agent']='0';
                         
                    }

                   


          

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php include "toptitle.php" ?>


<style type="text/css">
    .errMsg{
        color: red;
    },
    input, select {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
</style>
<style type="text/css">
        .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}


</style>

<body ng-app="app" ng-controller="mainCtrl">
<!--<div class="se-pre-con"></div>-->
    


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
                 <form id="myform" class="form-horizontal" action="" method="post">
                <div class="span11 widget-container-span">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h5 class="smaller">Generate Marine Certificate</h5>

                                            <div class="widget-toolbar no-border">
                                                <ul class="nav nav-tabs" id="myTab">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#home">General Details</a>
                                                    </li>

                                                    <li>
                                                        <a data-toggle="tab" href="#profile">Shipping Details</a>
                                                    </li>

                                                    <!--<li>
                                                        <a data-toggle="tab" href="#final">Premium Details</a>
                                                    </li>-->
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main padding-6">
                                                <div class="tab-content">
                                                    <div id="home" class="tab-pane in active">
                                                        <table border="0" class="table  table-bordered table-hover no-margin-bottom">
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Product</label>
                                                                    <select class="form-control" name="product" style="width: 160px;">
                                                                    <option>MARINE CARGO</option>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Intermediary</label>
                                                                    <!--<input type="text" name="agent" value="" readonly />-->
                                                                    <select name="agent" style="width: 160px; ">
                                                                    <?php if($_SESSION['agent']==0){

                                                                       echo "<option value='$_SESSION[agent]'>DIRECT</option>";

                                                                        }else{

                                                                       echo "<option value='$_SESSION[agent]'>".$_SESSION['agent']."</option>";

                                                                        }  ?>


                                                                        
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Cover</label>
                                                                    <!--<input type="text" name="agent" value="" readonly />-->
                                                                    <select name="cover"  id="cover" required="true" style="width: 160px;  ">
                                                                        <option value="">Select Cover</option>
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
                                                                    <label>Shipping Mode</label>
                                                                    <select  class="form-control" name="shipmode" id="shipmode" style="width: 160px;">
                                                                    <option value="">Choose...</option>
                                                                    <option value="Sea">Sea</option>
                                                                    <option value="Air">Air</option>
                                                                    </select>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Packaging Type</label>
                                                                    <select required class="form-control" name="product" id="product" style="width: 160px;">

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
                                                                    <?php 
                                                                    $names= mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
                                                                    $row_names=mysql_fetch_array($names);
                                                                    $identity=$row_names['fname']." ".$row_names['sname'];
                                                                    $email=$row_names['email'];
                                                                    $mobileno=$row_names['mobile_no'];
                                                                    $pin_no=$row_names['pin'];


                                                                     ?>
                                                                    <div class="form-group">
                                                                    <label>Owner (Names)</label>
                                                                    <input type="text" name="owner" value="<?php if($_SESSION['agent']!='DIRECT'){}else{echo $identity;}  ?>" style="width: 205px;" required />
                                                                    </div>
                                                                </td>-->
                                                                </tr>
                                                                <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" value="<?php if($_SESSION['agent']!=0){}else{echo $email;} ?>"  required style="width: 150px;"/>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Mobile Number</label>
                                                                    <input type="text" name="mobileno" value="<?php if($_SESSION['agent']!=0){}else{echo $mobileno;} ?>"  required style="width: 150px;"/>
                                                                    </div>
                                                                    </td>
                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Cover Period From:</label>
                                                                    <input type="date" name="periodfrom" required style="width: 150px;"/>
                                                                    </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Period To:</label>
                                                                    <input type="date" name="periodto" required style="width: 150px;" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                  <div class="form-group">
                                                                <label>Pin Number</label>
                                                                <input type="text" name="pin" maxlength="11" value="<?php if($_SESSION['agent']!=0){}else{echo $pin_no;} ?>" minlength="11" pattern="^[a-zA-Z][a-zA-Z0-9]+$" style="text-transform:uppercase" style="width: 205px;" required="true" />
                                                                </div>      
                                                                </td>

                                                                 <td>
                                                                    <div class="form-group">
                                                                    <label>UCR NO.</label>
                                                                    <input type="text" name="ucr" id="ucr" required style="width: 150px;"/>
                                                                    <span id='sp' hidden style="color:red">Invalid UCR</span>
                                                                    </div>
                                                                </td>


                                                                </tr>
                                                            <tr>
                                                                 <td>
                                                                    <?php 
                                                                    $names= mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
                                                                    $row_names=mysql_fetch_array($names);
                                                                    $identity=$row_names['fname']." ".$row_names['sname'];
                                                                    $email=$row_names['email'];
                                                                    $mobileno=$row_names['mobile_no'];
                                                                    $pin_no=$row_names['pin'];


                                                                     ?>
                                                                    <div class="form-group">
                                                                    <label>Owner (Names)</label>
                                                                    <input type="text" name="owner" value="<?php if($_SESSION['agent']!=0){}else{echo $identity;}  ?>" style="width: 205px;" required />
                                                                    </div>
                                                                </td>
                                                            
                                                                 <td>
                                                                    <a href="profile"><button  id='p1' class="btn btn-primary">Proceed </button></a>
                                                                </td>
                                                                
                                                                <td>
                                                                    
                                                                </td>
                                                                

                                                            </tr>

                                                        </table>
                                                    </div>





                                                    <div id="profile" class="tab-pane">
                                                        <table border="0" class="table  table-bordered table-hover no-margin-bottom">
                                                            <tr>
                                                                
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Shipment Cover Type</label>
                                                                    <select required class="form-control" name="shipcover" id="shipcover" style="width: 160px;">
                                                                    <option value="">Choose...</option>
                                                                    <option value="Port to Port">Port to Port</option>
                                                                    <option value="Warehouse to Warehouse">Warehouse to Warehouse</option>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Country of Origin</label>
                                                                    <select required class="form-control" name="origincountry" id="origincountry" style="width: 150px;">
                                                                    <option value="">Choose country</option>
                                                                    <?php
                                                                    $country = mysql_query("SELECT * FROM country");
                                                                    while($countries=mysql_fetch_array($country)){
                                                                    echo "<option value='".$countries['country_code']."'>".$countries['name']."</option>";
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                           
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Port of Origin</label>
                                                                    <select required class="form-control" name="cityorigin" id="cityorigin" style="width: 150px;">
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                 </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Destination Country</label>
                                                                    <select required class="form-control" name="destcountry" id="destcountry" style="width: 150px;">

                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Destination Port</label>
                                                                    <select required class="form-control" name="citydestination" id="citydestination" style="width: 150px;">
                                                                    </select>
                                                                    </div>
                                                                    </td>
                                                           
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Vessel Name</label>
                                                                    <input type="text" required  class="form-control" name="vname" id="vname" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>
                                                                     </tr>
                                                            <tr>

                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Voyage Number</label>
                                                                    <input type="Number" required class="form-control" name="vnumber" id="vnumber" style="width: 150px;">
                                                                    </div>
                                                                    </td>
                                                                   


                                                           
                                                           <!-- <tr>
                                                                

                                                                <td>
                                                                    <a href="profile"><button id="p2" class="btn btn-primary">Proceed </button></a>
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                
                                                                

                                                            </tr>-->
                                                            <!--</table>
                                                    </div>

                                                    <div id="final" class="tab-pane">
                                                    <table border="0" class="table  table-bordered table-hover no-margin-bottom">-->
                                                        
                                                               <td>
                                                                    <div class="form-group">
                                                                    <label>Sum Insured in Ksh.</label>
                                                                    <input type="text" name="suminsured" id="sum_insured" ng-model="sum_insured" style="width: 150px;" required />
                                                                    </div>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Trans-shipment</label>
                                                                    <select required class="form-control" name="trans" id="trans" style="width: 160px;">
                                                                    <option value="">Select option</option>
                                                                    <option value="Y">YES</option>
                                                                    <option value="N">NO</option>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                 </tr>
                                                                 <tr>

                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Transhipment Country</label>
                                                                    <select required class="form-control" name="trans_country" id="trans_country" style="width: 150px;">
                                                                    <option selected value="none">Choose country</option>
                                                                    <?php
                                                                    $country = mysql_query("SELECT * FROM country");
                                                                    while($countries=mysql_fetch_array($country)){
                                                                    echo "<option value='".$countries['country_code']."'>".$countries['name']."</option>";
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    </div>
                                                                </td>




                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Transhipment Port</label>
                                                                    <!--<input type="text" name="transcity" id="transcity"  style="width: 150px;" />-->

                                                                    <select required class="form-control" name="transcity" id="transcity" style="width: 150px;">
                                                                    </select>

                                                                    <!--<select required  class="form-control" name="transcity" id="transcity" style="width: 150px;">
                                                                    <option value="0" selected>Select City</option>
                                                                    </select>-->
                                                                    </div>
                                                                </td>
                                                                </td>
                                                               


                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Stamp Duty in Ksh.</label>
                                                                    <input type="number" step="any" readonly name="stamp" id="stamp" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>

                                                                     </tr>
                                                                     <tr>

                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Training Levy in Ksh.</label>
                                                                    <input type="number" step="any "     readonly name="training" id="training" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>

                                                                    



                                                                 
                                                                 

                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Policy Fund in Ksh.</label>
                                                                    <input type="number" step="any"   readonly name="fund" id="fund" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>
                                                               

                                                                    <td>
                                                                      <div class="form-group">
                                                                    <label>War Premium in Ksh.</label>
                                                                    <input type="text" name="war_prem" id="war_prem"  readonly style="width: 150px;"/ >
                                                                    </div>      
                                                                    </td>

                                                                        </tr>
                                                                <tr>

                                                                    <td>
                                                                      <div class="form-group">
                                                                    <label>Basic Premium in Ksh.</label>
                                                                    <input type="text" name="premium" id="premium"  readonly style="width: 150px;"/ >
                                                                    </div>      
                                                                    </td>
                                                                 

                                                           
                                                               <td>
                                                                  <div class="form-group">
                                                                    <label>Total Premium in Ksh.</label>
                                                                    <input type="text" name="tpremium" id="tpremium"  readonly style="width: 150px;"/ >
                                                                    </div>      
                                                                </td>

                                                            
                                                                <td>
                                                                    <input type="submit" name="submit" value="Generate" class="btn btn-primary button-loading" data-loading-text="Loading...">
                                                                    <div class="control-group">
                                                                </td>
                                                                <td></td>
                                                                <td></td>

                                                            </tr>
                                                        </table>
                                                      
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>



<?php
if($_POST['submit']){ 



///generate policy_no

       include 'ora_connect.php';
        $sql_get_sn="select * from STDGBDATA.classbr where class=63";

         $ora_stmt=oci_parse($oraconn, $sql_get_sn);

         oci_execute($ora_stmt);
         $row=oci_fetch_array($ora_stmt);
         
         $serial=$row["POLICY_SERIAL"];
         $serial_next=$serial +1;
         $sql_upd_sn="update STDGBDATA.classbr set POLICY_SERIAL=".$serial_next." where class=63";

         $parsed_next_sn= oci_parse($oraconn, $sql_upd_sn);

         //oci_bind_by_name($parsed_next_sn, ":nxt", $serial_next);

         $status=oci_execute($parsed_next_sn);


         if($status){
            oci_commit($oraconn);

            echo "update sucsess";
         }else{

            oci_rollback($conn);
            echo "failed to update next";

         }
         

      

         $formatted_sn= sprintf("%06d", $serial);
         $month=date('m');
         $year=date("Y");
         $policy_no="0100201". $formatted_sn.$year.$month;

        





        //$row_cargo=mysql_fetch_array(mysql_query("select category from cargocat where catid=".$_POST['cargocat']),MYSQL_ASSOC);
        //echo $cago_category=$row_cargo['category'];

        //insert actual names of origin country
        //$sql_actual="select * from country where country_code='".$_POST['origincountry']."'";
        //$row_actual=mysql_query($sql_actual);
        //$actual_country=mysql_fetch_array($row_actual);
        $actual_country['name']=$_POST['origincountry'];

        //actual name of destination country
        //$sql_actual1="select * from country where country_code='".$_POST['destcountry']."'";
        //$row_actual1=mysql_query($sql_actual1);
        //$actual_dest=mysql_fetch_array($row_actual1);
        $actual_dest['name']=$_POST['destcountry'];




    
           $sql= "insert into certificates( `cargo_type`, `shipping_mode`, `package_type`, `shp_cover_type`, `sum_insured`, `country_orig`, `country_dest`, `city_orig`, `city_dest`, `owner`, `email`, `mobile`, `p_from`, `p_to`, `pin`, `premium`,`userid`,`Total_premium`,`vessel`,`vessel_no`,`war`,`stamp`,`p_fund`,`levy`,`transhipment`,`transhipment_location`,`ucr`,`agent_branch`,`tranship_country`,`policy_no`) values(".$_POST['cargotype1'].",'".$_POST['shipmode']."','".$_POST['product']."','".$_POST['shipcover']."',".$_POST['suminsured'].",'".$actual_country['name']."','".$actual_dest['name']."','".$_POST['cityorigin']."','".$_POST['citydestination']."','".$_POST['owner']."','".$_POST['email']."','".$_POST['mobileno']."','".$_POST['periodfrom']."','".$_POST['periodto']."','".$_POST['pin']."','".$_POST['premium']."',".$_SESSION['userid'].",'".$_POST['tpremium']."','".$_POST['vname']. "','".$_POST['vnumber']. "',".$_POST['war_prem'].",".$_POST['stamp'].",".$_POST['fund'].",".$_POST['training'].",'".$_POST['trans']."','".$_POST['transcity']."','".$_POST['ucr']."',".$_POST['agent'].",'".$_POST['trans_country']."','$policy_no')";


          //break;break;break;

         


   
        $add_certificate = mysql_query($sql);
        


        if($add_certificate)
        {


            $slog_sql="insert into loghist(user_id,login,logged,activity) values('$_SESSION[userid]',now(),'Y','generated certificate')";
            $slog = mysql_query($slog_sql);
            
            $latest = mysql_query("SELECT * FROM certificates order by id desc limit 1");
            $row_latest=mysql_fetch_array($latest);
            $id_latest=$row_latest['id'];
            $_SESSION['certno']=$id_latest;

            //-----------insert into aims marineprop-------------------------------------------------------------------------//
                include 'ora_connect.php';   

               $month_description=date('M');
                $date= date_parse($month_description);
                $month=$date['month'];
                $day=date("d");
                $year=date("y");

                switch ($month) {
                    case 1:
                        $act_month= "JAN";
                        break;
                    case 2:
                        $act_month= "FEB";
                        break;
                    case 3:
                        $act_month= "MAR";
                        break;
                    case 4:
                        $act_month= "APR";
                        break;
                    case 5:
                        $act_month= "MAY";
                        break;
                    case 6:
                        $act_month= "JUN";
                        break;
                    case 7:
                        $act_month= "JUL";
                        break;
                    case 8:
                        $act_month= "AUG";
                        break;
                    case 9:
                        $act_month= "SEPT";     
                        break;
                    case 10:
                        $act_month= "OCT";  # code...
                        break;
                    case 11:
                        $act_month= "NOV";  # code...
                        break;
                    case 12:
                        $act_month= "DEC";  # code...
                        break;
                    
                }

                $passed_mon=$day."-".$act_month."-".$year;
                
                $today=$passed_mon;

                //get agent details
                $sql_details="select * from users where id=".$_SESSION['userid'];
                $sql_details_results=mysql_query($sql_details);
                $details_row=mysql_fetch_array($sql_details_results);

                //get cargotype
                $row_cargotype=mysql_fetch_array(mysql_query("select * from cargotype where ctypeid=".$_POST['cargotype1']),MYSQL_ASSOC);
                $cago_type=$row_cargotype['ctype'];

                //get cargocategory
                $row_catca=mysql_fetch_array(mysql_query("select * from cargocat where catid=".$_POST['cargocat']),MYSQL_ASSOC);
                $category_name=$row_catca['category'];

                //get certificate number
                $latest_cert="select max(id) ID from certificates where Total_premium=".$_POST['tpremium'];
                $cert_number_latest=mysql_fetch_array(mysql_query($latest_cert));
                $the_cert=$cert_number_latest['ID'];

                 "<br>";
                
                $ora_sql = "INSERT INTO STDGBDATA.MARINEPROPOSAL 
                    (
                    CERTID,BRANCH,AGENT,SURNAME,FIRST_NAME,PIN_NO,ID_NUMBER,ADDRESS,MOBILE_NO,CLASS,PROPOSAL_DATE,
                    VESSEL_NAME,VESSEL_NO,CARGO_CATEGORY,SHIPPING_MODE,PACKAGING_TYPE,COVER_TYPE,SUM_INSURED,ORIG_COUNTRY,ORIG_CITY,DEST_COUNTRY,DEST_CITY,EMAIL,TOTAL_PREM,BASIC_PREM,WAR_PREM,TRANSHIPMENT,TRANSHIPMENT_CITY,STAMP_DUTY,T_LEVY,POL_FUND,PERIOD_FROM,PERIOD_TO,PROCESSED,CONSIGNMENT,MRATE,POLICY_NO
                    )
                    VALUES(".$the_cert.",10,90491,'".$details_row['sname']."','".$details_row['fname']."','".$details_row['pin']."',".$details_row['id_no'].",'".$details_row['address']."','".$details_row['mobileno']."',063,sysdate,'".$_POST['vname']."',".$_POST['vnumber'].",'".$category_name."','".$_POST['shipmode']."','".$_POST['product']."','".$_POST['shipcover']."',".$_POST['suminsured'].",'".$actual_country['name']."',
                        '".$_POST['cityorigin']."','".$actual_dest['name']."','".$_POST['citydestination']."','".$_POST['email']."',".$_POST['tpremium'].",".$_POST['premium'].",".$_POST['war_prem'].",'".$_POST['trans']."','".$_POST['transcity']."',".$_POST['stamp'].",".$_POST['training'].",".$_POST['fund'].",to_date('".$_POST['periodfrom']."','YYYY-MM-DD'),to_date('".$_POST['periodto']."','YYYY-MM-DD'),'N',0,".$_POST['cargotype'].",'$policy_no')";

          
                    $ora_stmt=oci_parse($oraconn, $ora_sql);
                    $execute=oci_execute($ora_stmt);
                    oci_commit($oraconn);



                //////////////////////issue mci soap rerquest ///////////////////////////////////////////////////////////////////////////////////
               /* $sql_cert_det=mysql_query("select * from certificates where id=".$the_cert);
                $cert_det=mysql_fetch_array($sql_cert_det);

                //generate hash
                $code=$cert_det['ucr'];
                $ucr=$code.'ACYACY2017';
                $token=hash('sha256', $ucr);

            $client = new SoapClient(
                "http://trial.kenyatradenet.go.ke/kesws/MCISubmissionService?wsdl", 
                array(
                    'trace' => true,
                    'proxy_host'     => '192.168.1.150',
                    'proxy_port'     => '3128',
                    'stream_context' => stream_context_create(
                        array(
                            'proxy' => "tcp://$PROXY_HOST:$PROXY_PORT",
                            'request_fulluri' => true,
                        )
                    ),
                )
            );

            $xml = '<arg0><![CDATA[<?xml version="1.0" encoding="utf-8"?> 
                            <mcirequest> 
                            <msghdr> 
                            <msgid>OG_MCI_REQ</msgid> 
                            <refno>'.$cert_det['ucr'].'</refno>
                             <msg_func>9</msg_func> 
                             <sender>ACY</sender> 
                             <receiver>KESWS</receiver> 
                             <version>1</version> 
                             <docno>str1234</docno> 
                             <docgroup>str1234</docgroup> 
                             <msgdate>17082017152411</msgdate> 
                             <token>'.$token.'</token> 
                             </msghdr> 
                             <mci_details> 
                             <request_number>'.$cert_det['id'].'</request_number>
                             <ver_no>1</ver_no> 
                             <importer_pin>A000091600P</importer_pin> 
                             <importer_type>Direct</importer_type> 
                             <broker_name>Direct</broker_name> 
                             <broker_pin>A000091600P </broker_pin>
                             <ucr_code>'.$cert_det['ucr'].'</ucr_code>
                             <origin_country>'.$cert_det['country_orig'].'</origin_country> 
                             <destination_country>'.$cert_det['country_dest'].'</destination_country>
                             <origin_port>'.$cert_det['city_orig'].'</origin_port> 
                             <destination_port>'.$cert_det['city_dest'].'</destination_port> 
                             <mci_issuer>African Merchant Assurance Company Ltd</mci_issuer> 
                             <rotation_number>33434</rotation_number> 
                             <vessel_name>'.$cert_det['vessel'].'</vessel_name> 
                             <voyage_number>'.$cert_det['vessel_no'].'</voyage_number>
                             <eta>17082017152411</eta> 
                             <cargoType> 
                             <dry_bulk_ind>Y</dry_bulk_ind> 
                             <cont_ind>N</cont_ind> 
                             <general_ind>N</general_ind> 
                             <vehicle_ind>N</vehicle_ind> 
                             <animal_ind>N</animal_ind> 
                             <liquid_ind>N</liquid_ind> 
                             </cargoType> 
                             <financier_pin> 
                             </financier_pin> 
                             <transhipping> 
                             <trans_port>'.$cert_det['transhipment_location'].'</trans_port> 
                             <country>KE</country> 
                             <quantity>1</quantity> 
                             <vessel_name>None</vessel_name> 
                             </transhipping> 
                             <items> 
                             <itemSeq_num>1</itemSeq_num> 
                             <goods_desc>'.$cert_det['cargo_type'].'</goods_desc> 
                             <quantity>1</quantity> 
                             <uom>4A</uom> 
                             <package_type>1A</package_type> 
                             <marks_numbers>str1234</marks_numbers> 
                             <origin_country>'.$cert_det['country_orig'].'</origin_country> 
                             <currency_code>KES</currency_code> 
                             <CIF>700.00</CIF> 
                             <CIF_NCY>700.00</CIF_NCY> 
                             </items> 
                             <items>
                             <itemSeq_num>1</itemSeq_num> 
                             <goods_desc>g</goods_desc> 
                             <quantity>1</quantity> 
                             <uom>4A</uom> 
                             <package_type>1A</package_type> 
                             <marks_numbers>str1234</marks_numbers> 
                             <origin_country>KE</origin_country> 
                             <currency_code>KES</currency_code> 
                             <CIF>700.00</CIF> <CIF_NCY>700.00</CIF_NCY> 
                             </items> 
                             <documents> 
                             <doc_name>str1234</doc_name> 
                             <doc_code>str1234</doc_code> 
                             <file_name>str1234</file_name> 
                             </documents> 
                             <mci_internal_number>SNL-1493892132</mci_internal_number> 
                             <mci_certificate_number>None</mci_certificate_number> 
                             <policy_number>None</policy_number> 
                             <premium_amount>'.$cert_det['premium'].'</premium_amount> 
                             <policy_holders_fund>'.$cert_det['p_fund'].'</policy_holders_fund> 
                             <stamp_duty>'.$cert_det['stamp'].'</stamp_duty>
                             <training_levy>'.$cert_det['levy'].'</training_levy> 
                             <total_premium>'.$cert_det['Total_premium'].'</total_premium> 
                             <sum_insured>'.$cert_det['sum_insured'].'</sum_insured> 
                             <servey_agents>344</servey_agents> 
                             <approval_type>Bank</approval_type>  
                             <role_code>R_BA_PCO</role_code> 
                             <remarks>N.A</remarks> 
                             <status>Approved</status>  
                             <created_date>18082017123412</created_date> 
                             <endrosement> 
                             <transferee_pin>A000091600P</transferee_pin> 
                             <transferee_ucr>UCR201700045846</transferee_ucr> 
                             </endrosement> 
                             </mci_details> 
                             </mcirequest> ]]>
                             </arg0>';
                                                
                

            $args =array(new SoapVar($xml, XSD_ANYXML));    
            $param = array('arg0' => $args[0]);

            $response = $client->__soapCall("receiveMCISubmissionRequest", array($param));
            $data=new SimpleXMLElement($response->return);
            
            //echo "<br><br>";
            $ucr_valid=$data->mci_response->response->code;

            if(trim($ucr_valid[0])=='F'){
            
              //update the certificate as not submitted to kentrade
                $sql_trade="update certificates set kentrade=N where id=".$the_cert;
                mysql_query($sql_trade);


            }else{

              //update the certificate as being subm
                $sql_trade="update certificates set kentrade=Y where id=".$the_cert;
                mysql_query($sql_trade);


            }


            */
                ////////////////////  end of soap request////////////////////////////////////////////////////////////////////////////////////////
          
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
           // echo "window.location.href = 'http://localhost/marine/iframe.php?id=".$id_latest."';";
             echo "window.location.href = 'doc_upd.php?certno=".$id_latest."';";
            echo "</script>";
            
            //header('http://localhost/marine/viewcert.php');

           


        }else{

            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "alert('Please fill the required details')";
            //echo "alert('Failed to Generate Marine Certificate')";
            echo "</script>";

        }



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

<script src="assets/js/jquery.validate.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>









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
    function show_next() {
               document.getElementById('profile').style.display = "block";
         }

        jQuery(document).ready(function()
        {

       

          

           var today = new Date().toISOString().split('T')[0];
           document.getElementsByName("periodfrom")[0].setAttribute('min', today);
           document.getElementsByName("periodto")[0].setAttribute('min', today);



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
                var cover=$("select#cover option:selected").attr('value');
                var my_object = {"categ": cargo_cat, "cover":cover};





                //alert(cargo_cat);
        

                    $.ajax({
                        url:"get_cargo_type.php",
                        //data:"categ="+cargo_cat,
                        data:my_object,
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

                     $.ajax({
                        url:"get_dest_country.php",
                        data:"id="+country,
                        type:"post",
                        success:function(resp){
                            $("select#destcountry").html(resp);
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
                            //$('#transdest option[value='+country+']').attr('selected','selected');
                            $("select#transcity").html(resp);
                            
                        },
                        error:function(resp){}

                    });
            

            });


            //city destination
          $("select#citydestination").change(function()
            {
                var city=$("select#citydestination option:selected").attr('value');
                $("select#transcity").children('option[value="' + city + '"]').attr('disabled', true);
            
            

            });










          //transhipment

          $("select#trans").change(function()
            {
                //alert('transhipment');
                var selected=$("select#trans option:selected").attr('value');
                //alert(country);
                if(selected=='Y'){

                   $('#transdest').removeAttr('disabled');
                   $('#transcity').removeAttr('disabled');
                   $('#trans_country').removeAttr('disabled');

                }else if(selected=='N'){
                    $('#transdest').prop('disabled', 'disabled');
                    $('#transcity').prop('disabled', 'disabled');
                     $('#trans_country').prop('disabled', 'disabled');
                    


                }

            });

          $("select#trans_country").change(function()
            {
                var country=$("select#trans_country option:selected").attr('value');
                //alert(country);
        

                    $.ajax({
                        url:"get_city.php",
                        data:"id="+country,
                        type:"post",
                        success:function(resp){
                            $("select#transcity").html(resp);
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
                         options += '<option selected value="">..choose</option>';
                        options += '<option value="containerized">Containerized</option>';
                         options += '<option value="non_containerized">Non-Containerized</option>';
                        $("select#product").html(options);
           
           

                }else{
                         var options='';
                        options += '<option selected value="">..choose</option>';
                        options += '<option value="air">Non-Containerized</option>';
                        $("select#product").html(options);



                }
            
            
            });




            $("select#product").change(function()
            {
                var ship_mod=$("select#product option:selected").attr('value');
                var icc=$("select#cover option:selected").attr('value');
                var my_object = {"ship": ship_mod, "clause":icc};
               //alert(ship_mod);
              //ajax

                    $.ajax({
                        url:"get_cargo_type.php",
                        //data:"categ="+cargo_cat,
                        data:my_object,
                        type:"post",
                        success:function(resp){

                            $("select#cargotype").html(resp);



                             $.ajax({
                                url:"get_cargo_type1.php",
                                data:my_object,
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


<script type="text/javascript">
   jQuery(document).ready(function()
        { 
//////////disable clicking of tabs
$('li:has([data-toggle="tab"])').click(function(event){return false;});

///////////////disable pasting into ucr textbox

$('#ucr').bind("cut copy paste",function(e) {
      e.preventDefault();
   });

//////////////////////////////////


var searchRequest = null;
var minlength =10;
$("#p1").prop("disabled",true);

$("#ucr").keyup(function () {

        ucr = $('#ucr').val();
        $('#sp').hide();

        if (ucr.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                                url:"ucr_validation.php",
                                data:"ucr="+ucr,
                                type:"post",
                                beforesend: function(){
                                   $('#sp').remove();
                                },
                                success:function(resp){

                                    var obj = JSON.parse(resp);
                                    //alert(obj.response);
                                        
                                    if(obj.response==1){

                                    $("#p1").prop("disabled",false);      

                                    }else{
                                    
                                    $('#sp').show();

                                    }
                                },
                                error:function(resp){
                                    //alert('An error occured during validation of UCR');
                                }

                            });
        }
    });






    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });



         $("#p1").click(function(){
        





         //activaTab('profile');
          if($("#myform").valid()){
                 activaTab('profile');
            }else{
                alert('Please fill the required details');
                //alert("Please fill the required details");
           }
              
            });
  
         



         function activaTab(tab){
           $('.nav-tabs a[href="#' + tab + '"]').tab('show');
         };


         $('#myform').validate({
            errorElement: 'span',
            errorClass: 'errMsg',
            focusInvalid: false,
            rules: {
                cover: {
                    required: true
                    
                },
                cargocat: {
                    required: true
                },
                cargotype: {
                    required: true
                    
                },
                periodfrom: {
                    required: true
                },
                periodto: {
                    required: true
                },
                
                shipmode:{
                    required:true
                },
                 shipcover:{
                    required: true
                },
                origincountry:{
                    required: true
                }
            },

            messages: {
                cover: {
                    required: "Please choose cover",
                 
                },
                cargocat: {
                    required: "Please choose a category",
                   
                },
                cargotype: {
                    required: "Please choose a type",
                   
                },
               periodfrom: {
                    required: "Please choose a period",
                   
                },
                periodto: {
                    required: "Please choose a period"
                },
                 shipmode:{
                    required: "Please Choose mode"
                },
                shipcover:{
                    required: "Please Choose cover"
                },
                origincountry:{
                    required: "Please Choose country"
                }
            },
             highlight: function (e) {
                $(e).closest('.control-group').removeClass('info').addClass('error');
            },
            
        
        });







        });





</script>




</body>
</html>
