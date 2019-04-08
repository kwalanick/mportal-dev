<?php
session_start();
$user_id = $_SESSION['userid'];
$name = $_SESSION['fname'];
$adm = $_SESSION['admin'];


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
//$activeopen4 = "active open";
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






                <form class="form-horizontal" action="remark.php" method="post">
<table border="0" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
 <thead>
                                        <tr>

                                        <?php if ($_GET['cert_id']){
        $_SESSION['cert_id']=$_GET['cert_id'];
        $certificate= "SELECT * FROM certificates where id=".$_SESSION['cert_id'];
        $resultset = mysql_query($certificate); 
        while($row=mysql_fetch_array($resultset)){
                $_SESSION['amount']=$row['Total_premium'];

        };
       
}?>
                                                
                                                <th>Approve Payments</th>
                                                <th>Amount Approved</th>
<tr>
<td>
<div class="form-group">
<label>Remarks</label>
<input type="text" name="remark" id="remark" required style="width: 500px;"/>
</div>
</td>

<td>
<div class="form-group">
<label>Amount in K.sh</label>
<input type="text" name="amount" id="amount" value="<?php echo  $_SESSION['amount'];?> " required style="width: 500px;"/>
</div>
</td>

</tr>
<tr>
<td>
<input type="submit" name="update_amount" value="UPDATE" class="btn-primary" >

</td>
<td></td>
</tr>         

</table>                                                
</form>


<?php


if($_POST['update_amount'])
{

         
        $sql_update="update certificates set amount=$_POST[amount],remark='$_POST[remark]' where id=$_SESSION[cert_id]";
        $upd=mysql_query($sql_update);

        $query_new = mysql_query("select * from classbr");

        while($data = mysql_fetch_array($query_new))
        {
            if ($data['policy_serial'] <= $data['end_serial'])
            {
               echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
               echo "alert('Policy Serials Available!')";
               echo "</script>";
               $serial_new = $data['policy_serial'];
            }
            else
            {
               // echo error message
               echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
               echo "alert('Policy Serials have been Exhausted!')";
               echo "</script>";
            }
        }

        
        //generate policy no
        $formatted_sn= sprintf("%06d", $serial_new);
        $month=date('m');
        $year=date("Y");
        $policy_no="0100201". $formatted_sn.$year.$month;

        

        //Update cert policy
		$uppolicy=mysql_query("update certificates set policy_no='$policy_no' where id=$_SESSION[cert_id]");
        
        //update policy serials
        $next_serial = $serial_new +1 ;
        $upserial = mysql_query("update classbr set policy_serial=$next_serial");

        $todays_date = date("Y-m-d");

        //get certificate details
				$cerdet=mysql_query("SELECT * FROM certificates WHERE id=$_SESSION[cert_id]");
				$certrow=mysql_fetch_array($cerdet);

                //get agent details
                $sql_details="select * from users where id=".$_SESSION['userid'];
                $sql_details_results=mysql_query($sql_details);
                $details_row=mysql_fetch_array($sql_details_results);
				$fetchedrows=mysql_num_rows($sql_details_results);

                //get cargotype
                $row_cargotype=mysql_fetch_array(mysql_query("select * from cargotype where ctypeid=".$certrow['cargo_type']));
                $cago_type=$row_cargotype['ctype'];

                //get cargocategory
                $row_catca=mysql_fetch_array(mysql_query("select * from cargocat where catid=".$row_cargotype['catid']));
                $category_name=$row_catca['category'];
				
				//get country orig
                $countryorig=mysql_fetch_array(mysql_query("select * from country where country_code='".$certrow['country_orig']."' limit 1"));
				//echo "CT:".$certrow['country_orig']." Name:".$countryorig['name'];
				//get city orig
				$cityorig=mysql_fetch_assoc(mysql_query("select * from city where port_code='".$certrow['city_orig']."' limit 1"));
				//echo " CO:".$certrow['city_orig']." Name:".$cityorig['port_name'];
				//get country dest
                $countrydest=mysql_fetch_array(mysql_query("select * from country where country_code='".$certrow['country_dest']."' limit 1"));
				//get city dest
				$citydest=mysql_fetch_array(mysql_query("select * from city where port_code='".$certrow['city_dest']."' limit 1"));
				//get transcity
				$transcity=mysql_fetch_array(mysql_query("select * from city where port_code='".$certrow['transhipment_location']."' limit 1"));
                

                //get certificate number
                $the_cert=$_SESSION['cert_id'];



     
        $p_from = date("Y-m-d", strtotime($certrow['p_from']));
        $p_to = date("Y-m-d", strtotime($certrow['p_to']));

    
        $update_p = mysql_query("
        INSERT INTO marineproposal(`branch`,`agent`,`surname`, `first_name`, `others`, `id_number`, `address`, `mobile_no`,`class`,`proposal_date`,`vessel_no`, `vessel_name`, `sum_insured`, `remarks`,
        `certid`,`cargo_category`,`shipping_mode`,`packaging_type`, `cover_type`,`orig_country`, `orig_city`, `dest_country`, `dest_city`,`email`,`total_prem`, `basic_prem`,`war_prem`,`transhipment`, `transhipment_city`,
        `stamp_duty`, `t_levy`, `pol_fund`,`period_from`, `period_to`, `processed`,`consignment`,`mrate`, `policy_no`                   
        ) 
        VALUES('10','00022','".$details_row['sname']."','".$details_row['fname']."','','".$details_row['id_no']."','".$details_row['address']."','".$details_row['mobile_no']."','061','$todays_date',
        '".$certrow['vessel_no']."','".$certrow['vessel']."','".$certrow['sum_insured']."','$certrow[remark]','".$the_cert."','".$category_name."','".$certrow['shipping_mode']."','".$certrow['package_type']."',
        '".$certrow['shp_cover_type']."','".$countryorig['name']."','".$cityorig['port_name']."','".$countrydest['name']."','".$citydest['port_name']."','".$certrow['email']."','".$certrow['Total_premium']."',
        '".$certrow['premium']."','".$certrow['war']."','".$certrow['transhipment']."','".$transcity['port_name']."',".$certrow['stamp'].",".$certrow['levy'].",".$certrow['p_fund'].",'$p_from','$p_to','N',
        '0','1','$policy_no'
        )
        ");

        if ($update_p)
        {
              echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
              echo "alert('Success!')";
              echo "</script>";
        }
        else
        {
              echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
              echo "alert('Failed!')";
              echo "</script>";
        }
             


		
        //UPDATE AIMS
        ///generate policy_no
	    include 'ora_connect.php';
        $sql_get_sn="select * from STDGBDATA.classbr where class=61";

         $ora_stmt=oci_parse($oraconn, $sql_get_sn);

         oci_execute($ora_stmt);
         $row=oci_fetch_array($ora_stmt);
         
         $serial=$row["POLICY_SERIAL"];
         $serial_next=$serial +1;
         $sql_upd_sn="update STDGBDATA.classbr set POLICY_SERIAL=".$serial_next." where class=61";

         $parsed_next_sn=oci_parse($oraconn, $sql_upd_sn);

         //oci_bind_by_name($parsed_next_sn, ":nxt", $serial_next);

         $status=oci_execute($parsed_next_sn);

         if($status)
        {
            oci_commit($oraconn);
            echo "update sucsess";
        }
        else
         {
            oci_rollback($oraconn);
            echo "failed to update next";
         }

        

         $formatted_sn= sprintf("%06d", $serial_new);
         $month=date('m');
         $year=date("Y");
         $policy_no="0100201". $formatted_sn.$year.$month;

      

		//Update cert policy
		$uppolicy=mysql_query("update certificates set policy_no='$policy_no' where id=$_SESSION[cert_id]");
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
				
				//get certificate details
				$cerdet=mysql_query("SELECT * FROM certificates WHERE id=$_SESSION[cert_id]");
				$certrow=mysql_fetch_array($cerdet);

                //get agent details
                $sql_details="select * from users where id=".$_SESSION['userid'];
                $sql_details_results=mysql_query($sql_details);
                $details_row=mysql_fetch_array($sql_details_results);
				$fetchedrows=mysql_num_rows($sql_details_results);

                //get cargotype
                $row_cargotype=mysql_fetch_array(mysql_query("select * from cargotype where ctypeid=".$certrow['cargo_type']));
                $cago_type=$row_cargotype['ctype'];

                //get cargocategory
                $row_catca=mysql_fetch_array(mysql_query("select * from cargocat where catid=".$row_cargotype['catid']));
                $category_name=$row_catca['category'];
				
				//get country orig
                $countryorig=mysql_fetch_array(mysql_query("select * from country where country_code='".$certrow['country_orig']."' limit 1"));
				//echo "CT:".$certrow['country_orig']." Name:".$countryorig['name'];
				//get city orig
				$cityorig=mysql_fetch_assoc(mysql_query("select * from city where port_code='".$certrow['city_orig']."' limit 1"));
				//echo " CO:".$certrow['city_orig']." Name:".$cityorig['port_name'];
				//get country dest
                $countrydest=mysql_fetch_array(mysql_query("select * from country where country_code='".$certrow['country_dest']."' limit 1"));
				//get city dest
				$citydest=mysql_fetch_array(mysql_query("select * from city where port_code='".$certrow['city_dest']."' limit 1"));
				//get transcity
				$transcity=mysql_fetch_array(mysql_query("select * from city where port_code='".$certrow['transhipment_location']."' limit 1"));
                

                //get certificate number
                $the_cert=$_SESSION['cert_id'];

                 "<br>";
                
                $ora_sql = "INSERT INTO STDGBDATA.MARINEPROPOSAL 
                    (
                    CERTID,BRANCH,AGENT,SURNAME,FIRST_NAME,PIN_NO,ID_NUMBER,ADDRESS,MOBILE_NO,CLASS,PROPOSAL_DATE,                   VESSEL_NAME,VESSEL_NO,CARGO_CATEGORY,SHIPPING_MODE,PACKAGING_TYPE,COVER_TYPE,SUM_INSURED,ORIG_COUNTRY,ORIG_CITY,DEST_COUNTRY,DEST_CITY,EMAIL,TOTAL_PREM,BASIC_PREM,WAR_PREM,TRANSHIPMENT,TRANSHIPMENT_CITY,STAMP_DUTY,T_LEVY,POL_FUND,PERIOD_FROM,PERIOD_TO,PROCESSED,CONSIGNMENT,MRATE,POLICY_NO,REMARKS
                    )
                    VALUES('".$the_cert."','10','00022','".$details_row['sname']."','".$details_row['fname']."','".$details_row['pin']."',".$details_row['id_no'].",'".$details_row['address']."','".$details_row['mobile_no']."','061',sysdate,'".$certrow['vessel']."',".$certrow['vessel_no'].",'".$category_name."','".$certrow['shipping_mode']."','".$certrow['package_type']."','".$certrow['shp_cover_type']."','".$certrow['sum_insured']."','".$countryorig['name']."','".$cityorig['port_name']."','".$countrydest['name']."','".$citydest['port_name']."','".$certrow['email']."','".$certrow['Total_premium']."','".$certrow['premium']."','".$certrow['war']."','".$certrow['transhipment']."','".$transcity['port_name']."',".$certrow['stamp'].",".$certrow['levy'].",".$certrow['p_fund'].",to_date('".$certrow['p_from']."','YYYY-MM-DD'),to_date('".$certrow['p_to']."','YYYY-MM-DD'),'N','0','1','$policy_no','$certrow[remark]')";

        
                    $ora_stmt=oci_parse($oraconn, $ora_sql);
                    $execute=oci_execute($ora_stmt);
                    $oracommit=oci_commit($oraconn);



//END UPDATE AIMS		
		
        if($oracommit){
                echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                echo "window.location = \"viewcert.php\";";
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

</body>
</html>
