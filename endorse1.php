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

            $_SESSION['endorse_no']=$_GET['cert_id'];

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
$activeopen6 = "active open";
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

                <?php
                 $sql_endt="select * from certificates where id=".$_SESSION['endorse_no'];
                 $endt_results=mysql_query($sql_endt);
                 $endt_details=mysql_fetch_array($endt_results);
                 $_SESSION['results_ent']=$endt_details;

                 
                 
                ?>
                 <form id="myform" class="form-horizontal" action="" method="post">
                <div class="span11 widget-container-span">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h5 class="smaller">Endorsement for policy number  <?php echo $_SESSION['results_ent']['policy_no'];?></h5>

                                            <div class="widget-toolbar no-border">
                                                <ul class="nav nav-tabs" id="myTab">

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
                                                  





                                                    <div id="profile" class="tab-pane in active">
                                                        <table border="0" class="table  table-bordered table-hover no-margin-bottom">
                                                            <tr>
                                                                
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Shipment Cover Type</label>
                                                                     <select required class="form-control" name="shipcover" id="shipcover" style="width: 160px;">

                                                                    <?php
                                                                     if($_SESSION['results_ent']['shp_cover_type']=='Warehouse to Warehouse'){
                                                                        echo  "<option selected value='".$_SESSION['results_ent']['shp_cover_type']."'>".$_SESSION['results_ent']['shp_cover_type']."</option>";
                                                                        echo  "<option value='Port to Port'>Port to Port</option>";
                                                                    }else{
                                                                         echo  "<option selected value='".$_SESSION['results_ent']['shp_cover_type']."'>".$_SESSION['results_ent']['shp_cover_type']."</option>";
                                                                        echo  "<option value='Warehouse to Warehouse'>Warehouse to Warehouse</option>";
                                                                 }






                                                                    ?>

                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Country of Origin</label>
                                                                    <select required class="form-control" name="origincountry" id="origincountry" style="width: 150px;">
                                                                    <option value="">Choose country</option>
                                                                    <?php
                                                                    $country = mysql_query("SELECT * FROM country order by name");
                                                                    while($countries=mysql_fetch_array($country)){

                                                                    if($countries['country_code']==$_SESSION['results_ent']['country_orig']){
                                                                        echo "<option selected value='".$countries['country_code']."'>".$countries['name']."</option>";

                                                                    }else{

                                                                    echo "<option value='".$countries['country_code']."'>".$countries['name']."</option>";
                                                                     }
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                           
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Port of Origin</label>
                                                                    <select required class="form-control" name="cityorigin" id="cityorigin" style="width: 150px;">
                                                                    <?php
                                                                    $sql_country="select country_code from country where country_code='".$_SESSION['results_ent']['country_orig']."'";
                                                                    $country_code=mysql_fetch_array(mysql_query($sql_country));


                                                                    $city = mysql_query("SELECT * FROM city where country_code='".$country_code['country_code']."'");
                                                                    while($ports=mysql_fetch_array($city)){
                                                                    

                                                                    if($ports['port_code']==$_SESSION['results_ent']['city_orig']){
                                                                        echo "<option selected value='".$ports['port_code']."'>".$ports['port_name']."</option>";

                                                                    }else{
                                                                        

                                                                    echo "<option value='".$ports['port_code']."'>".$ports['port_name']."</option>";
                                                                     }
                                                                    }

                                                                    ?>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                 </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Destination Country</label>
                                                                    <select required class="form-control" name="destcountry" id="destcountry" style="width: 150px;">
                                                                     <?php
                                                                    $country = mysql_query("SELECT * FROM country");
                                                                    while($countries=mysql_fetch_array($country)){

                                                                    if($countries['country_code']==$_SESSION['results_ent']['country_dest']){
                                                                        echo "<option selected value='".$countries['country_code']."'>".$countries['name']."</option>";

                                                                    }else{

                                                                    echo "<option value='".$countries['country_code']."'>".$countries['name']."</option>";
                                                                     }
                                                                    }
                                                                    ?>

                                                                    </select>

                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Destination Port</label>
                                                                    <select required class="form-control" name="citydestination" id="citydestination" style="width: 150px;">

                                                                    <?php
                                                                    $sql_country="select country_code from country where country_code='".$_SESSION['results_ent']['country_dest']."'";
                                                                    $country_code=mysql_fetch_array(mysql_query($sql_country));


                                                                    $city = mysql_query("SELECT * FROM city where country_code='".$country_code['country_code']."'");
                                                                    while($ports=mysql_fetch_array($city)){
                                                                    

                                                                    if($ports['port_code']==$_SESSION['results_ent']['city_dest']){
                                                                        echo "<option selected value='".$ports['port_code']."'>".$ports['port_name']."</option>";

                                                                    }else{
                                                                        

                                                                    echo "<option value='".$ports['port_code']."'>".$ports['port_name']."</option>";
                                                                     }
                                                                    }


                                                                    ?>



                                                                    </select>
                                                                    </div>
                                                                    </td>
                                                           
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Vessel Name</label>
                                                                    <input type="text" required  class="form-control" name="vname" id="vname" value="<?php echo $_SESSION[results_ent][vessel];?>" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>
                                                                     </tr>
                                                            <tr>

                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Voyage Number</label>
                                                                     <input type="Number" required class="form-control" name="vnumber" id="vnumber" value="<?php echo $_SESSION[results_ent][vessel_no];?>" style="width: 150px;">
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
                                                                    <input type="text" disabled name="suminsured" ng-init="sum_insured=<?php echo $_SESSION[results_ent][sum_insured];?>" id="sum_insured" ng-model="sum_insured" style="width: 150px;" required />
                                                                    </div>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <label>Trans-shipment</label>
                                                                    <select required class="form-control" name="trans" id="trans" style="width: 160px;">
                                                                    <option><?php echo $_SESSION[results_ent][transhipment];?></option>
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
                                                                    $country = mysql_query("SELECT * FROM country order by name");
                                                                    while($countries=mysql_fetch_array($country)){

                                                                    if($countries['country_code']==$_SESSION['results_ent']['tranship_country']){
                                                                        echo "<option selected value='".$countries['country_code']."'>".$countries['name']."</option>";

                                                                    }else{

                                                                    echo "<option value='".$countries['country_code']."'>".$countries['name']."</option>";
                                                                     }
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

                                                                        <?php
                                                                    $sql_country="select country_code from country where country_code='".$_SESSION['results_ent']['tranship_country']."'";
                                                                    $country_code=mysql_fetch_array(mysql_query($sql_country));


                                                                    $city = mysql_query("SELECT * FROM city where country_code='".$country_code['country_code']."'");
                                                                    while($ports=mysql_fetch_array($city)){
                                                                    

                                                                    if($ports['port_code']==$_SESSION['results_ent']['transhipment_location']){
                                                                        echo "<option selected value='".$ports['port_code']."'>".$ports['port_name']."</option>";

                                                                    }else{
                                                                        

                                                                    echo "<option value='".$ports['port_code']."'>".$ports['port_name']."</option>";
                                                                     }
                                                                    }


                                                                    ?>





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
                                                                    <input type="number" step="any" value="<?php echo $_SESSION[results_ent][stamp];?>" readonly name="stamp" id="stamp" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>

                                                                     </tr>
                                                                     <tr>

                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Training Levy in Ksh.</label>
                                                                    <input type="number" step="any " value="<?php echo $_SESSION[results_ent][levy];?>"    readonly name="training" id="training" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>

                                                                    



                                                                 
                                                                 

                                                                    <td>
                                                                    <div class="form-group">
                                                                    <label>Policy Fund in Ksh.</label>
                                                                     <input type="number" step="any" value="<?php echo $_SESSION[results_ent][p_fund];?>"   readonly name="fund" id="fund" style="width: 150px;"/>
                                                                    </div>
                                                                    </td>
                                                               

                                                                    <td>
                                                                      <div class="form-group">
                                                                    <label>War Premium in Ksh.</label>
                                                                    <input type="text" name="war_prem" value="<?php echo $_SESSION[results_ent][war];?>" id="war_prem"  readonly style="width: 150px;"/ >
                                                                    </div>      
                                                                    </td>

                                                                        </tr>
                                                                <tr>

                                                                    <td>
                                                                      <div class="form-group">
                                                                    <label>Basic Premium in Ksh.</label>
                                                                     <input type="text" name="premium" id="premium" value="<?php echo $_SESSION[results_ent][premium];?>"  readonly style="width: 150px;"/ >
                                                                    </div>      
                                                                    </td>
                                                                 

                                                           
                                                               <td>
                                                                  <div class="form-group">
                                                                    <label>Total Premium in Ksh.</label>
                                                                     <input type="text" name="tpremium" id="tpremium" value="<?php echo $_SESSION[results_ent][Total_premium];?>"  readonly style="width: 150px;"/ >
                                                                    </div>      
                                                                </td>

                                                            
                                                                <td>
                                                                    <input type="submit" name="submit" value="Update" class="btn btn-primary button-loading" data-loading-text="Loading...">
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

        //$row_cargo=mysql_fetch_array(mysql_query("select category from cargocat where catid=".$_POST['cargocat']),MYSQL_ASSOC);
        //echo $cago_category=$row_cargo['category'];

        //insert actual names of origin country
        $sql_actual="select * from country where country_code='".$_POST['origincountry']."'";
        $row_actual=mysql_query($sql_actual);
        $actual_country=mysql_fetch_array($row_actual);
        $actual_country['name'];

        //actual name of destination country
        $sql_actual1="select * from country where country_code='".$_POST['destcountry']."'";
        $row_actual1=mysql_query($sql_actual1);
        $actual_dest=mysql_fetch_array($row_actual1);
        $actual_dest['name'];




    
           //$sql= "insert into certificates(`category`, `cargo_type`, `shipping_mode`, `package_type`, `shp_cover_type`, `sum_insured`, `country_orig`, `country_dest`, `city_orig`, `city_dest`, `owner`, `email`, `mobile`, `p_from`, `p_to`, `pin`, `premium`,`userid`,`Total_premium`,`vessel`,`vessel_no`,`war`,`stamp`,`p_fund`,`levy`,`transhipment`,`transhipment_location`) values(".$_POST['cargocat'].",".$_POST['cargotype1'].",'".$_POST['shipmode']."','".$_POST['product']."','".$_POST['shipcover']."',".$_POST['suminsured'].",'".$actual_country['name']."','".$actual_dest['name']."','".$_POST['cityorigin']."','".$_POST['citydestination']."','".$_POST['owner']."','".$_POST['email']."','".$_POST['mobileno']."','".$_POST['periodfrom']."','".$_POST['periodto']."','".$_POST['pin']."','".$_POST['premium']."',".$_SESSION['userid'].",'".$_POST['tpremium']."','".$_POST['vname']. "','".$_POST['vnumber']. "',".$_POST['war_prem'].",".$_POST['stamp'].",".$_POST['fund'].",".$_POST['training'].",'".$_POST['trans']."','".$_POST['transcity']."')";

          $sql="update certificates set shp_cover_type='".$_POST['shipcover']."',country_orig='".$actual_country['name']."',country_dest='".$actual_dest['name']."',city_orig='".$_POST['cityorigin']."',city_dest='".$_POST['citydestination']."',userid=".$_SESSION['userid'].",vessel='".$_POST['vname']."',vessel_no='".$_POST['vnumber']."',transhipment='".$_POST['trans']."',transhipment_location='".$_POST['transcity']."' where id=". $_SESSION['endorse_no'];

         
      

   
        $add_certificate = mysql_query($sql);
        


        if($add_certificate)
        {

            $text="updated certificate ".$_SESSION['endorse_no'];
            $slog_sql="insert into loghist(user_id,login,logged,activity) values('$_SESSION[userid]',now(),'Y','$text')";
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
                echo $latest_cert="select max(id) ID from certificates where Total_premium=".$_POST['tpremium'];
                $cert_number_latest=mysql_fetch_array(mysql_query($latest_cert));
                $the_cert=$cert_number_latest['ID'];

                 "<br>";


                  

                $ora_sql= "update STDGBDATA.MARINEPROPOSAL set COVER_TYPE='".$_POST['shipcover']."',ORIG_COUNTRY='".$actual_country['name']."',DEST_COUNTRY='".$actual_dest['name']."',ORIG_CITY='".$_POST['cityorigin']."',DEST_CITY='".$_POST['citydestination']."',VESSEL_NAME='".$_POST['vname']."',VESSEL_NO='".$_POST['vnumber']."',TRANSHIPMENT='".$_POST['trans']."',TRANSHIPMENT_CITY='".$_POST['transcity']."' where CERTID=". $_SESSION['endorse_no'];

                
                /*$ora_sql = "INSERT INTO STDGBDATA.MARINEPROPOSAL 
                    (
                    CERTID,BRANCH,AGENT,SURNAME,FIRST_NAME,PIN_NO,ID_NUMBER,ADDRESS,MOBILE_NO,CLASS,PROPOSAL_DATE,
                    VESSEL_NAME,VESSEL_NO,CARGO_TYPE,CARGO_CATEGORY,SHIPPING_MODE,PACKAGING_TYPE,COVER_TYPE,SUM_INSURED,ORIG_COUNTRY,ORIG_CITY,DEST_COUNTRY,DEST_CITY,EMAIL,TOTAL_PREM,BASIC_PREM,WAR_PREM,TRANSHIPMENT,TRANSHIPMENT_CITY,STAMP_DUTY,T_LEVY,POL_FUND,PERIOD_FROM,PERIOD_TO,PROCESSED,CONSIGNMENT,MRATE
                    )
                    VALUES(".$the_cert.",10,90491,'".$details_row['sname']."','".$details_row['fname']."','".$details_row['pin']."',".$details_row['id_no'].",'".$details_row['address']."','".$details_row['mobileno']."',063,sysdate,'".$_POST['vname']."',".$_POST['vnumber'].",'". $cago_type."','".$category_name."','".$_POST['shipmode']."','".$_POST['product']."','".$_POST['shipcover']."',".$_POST['suminsured'].",'".$actual_country['name']."',
                        '".$_POST['cityorigin']."','".$actual_dest['name']."','".$_POST['citydestination']."','".$_POST['email']."',".$_POST['tpremium'].",".$_POST['premium'].",".$_POST['war_prem'].",'".$_POST['trans']."','".$_POST['transcity']."',".$_POST['stamp'].",".$_POST['training'].",".$_POST['fund'].",to_date('".$_POST['periodfrom']."','YYYY-MM-DD'),to_date('".$_POST['periodto']."','YYYY-MM-DD'),'N',0,".$_POST['cargotype'].")";*/

          
                    $ora_stmt=oci_parse($oraconn, $ora_sql);
                    $execute=oci_execute($ora_stmt);
                    oci_commit($oraconn);

                      //update the kentrade field
                $sql_upd="update certificates set kentrade='N' where id=".$_SESSION['endorse_no'];

                $res=mysql_query($sql_upd);

            

          
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
           // echo "window.location.href = 'http://localhost/marine/iframe.php?id=".$id_latest."';";
             echo "window.location.href = 'endt.php';";
            echo "</script>";
            
            //header('http://localhost/marine/viewcert.php');

           


        }else{

            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "alert('Failed to submit')";
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








         



         function activaTab(tab){
           $('.nav-tabs a[href="#' + tab + '"]').tab('show');
         };


        });





</script>




</body>
</html>
