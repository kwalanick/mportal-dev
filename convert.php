  <?php 
session_start();

$user_id = $_SESSION['userid'];
$name = $_SESSION['fname'];
$adm = $_SESSION['admin'];
$sql_ag="SELECT * FROM users where id=".$_SESSION['userid'];
$certificate=$_GET['cert_id'] ;//$_POST['cert_id'];

include 'connect.php';
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

                //certificate details
                $sql_det="select * from certificates where id=".$certificate;
                $cert_row=mysql_fetch_array(mysql_query($sql_det));

                //get agent details
                $sql_details="select * from users where id=".$_SESSION['userid'];
                $sql_details_results=mysql_query($sql_details);
                $details_row=mysql_fetch_array($sql_details_results);

                //get rate
                $sql_rate=mysql_query("select * from cargotype where ctypeid=".$cert_row['cargo_type']);
                $sql_res=mysql_fetch_array($sql_rate);

                //get cargotype
                $row_cargotype=mysql_fetch_array(mysql_query("select * from cargotype where ctypeid=".$cert_row['cargo_type']),MYSQL_ASSOC);
                $cago_type=$row_cargotype['ctype'];

                //get cargocategory
                $row_catca=mysql_fetch_array(mysql_query("select * from cargocat where catid=".$cert_row['category']),MYSQL_ASSOC);
                $category_name=$row_catca['category'];

                //get certificate number
                $latest_cert="select max(id) ID from certificates where Total_premium=".$cert_row['Total_premium'];
                $cert_number_latest=mysql_fetch_array(mysql_query($latest_cert));
                $the_cert=$cert_number_latest['ID'];

                 "<br>";
                $ora_sql = "INSERT INTO STDGBDATA.MARINEPROPOSAL 
                    (
                    CERTID,BRANCH,AGENT,SURNAME,FIRST_NAME,PIN_NO,ID_NUMBER,ADDRESS,MOBILE_NO,CLASS,PROPOSAL_DATE,
                    VESSEL_NAME,VESSEL_NO,CARGO_TYPE,CARGO_CATEGORY,SHIPPING_MODE,PACKAGING_TYPE,COVER_TYPE,SUM_INSURED,ORIG_COUNTRY,ORIG_CITY,DEST_COUNTRY,DEST_CITY,EMAIL,TOTAL_PREM,BASIC_PREM,WAR_PREM,TRANSHIPMENT,TRANSHIPMENT_CITY,STAMP_DUTY,T_LEVY,POL_FUND,PERIOD_FROM,PERIOD_TO,PROCESSED,CONSIGNMENT,MRATE
                    )
                    VALUES(".$cert_row['id'].",10,90491,'".$details_row['sname']."','".$details_row['fname']."','".$details_row['pin']."',".$details_row['id_no'].",'".$details_row['address']."','".$details_row['mobileno']."',063,sysdate,'".$cert_row['vessel']."',".$cert_row['vessel_no'].",'". $cago_type."','".$category_name."','".$cert_row['shipping_mode']."','".$cert_row['package_type']."','".$cert_row['shp_cover_type']."',".$cert_row['sum_insured'].",'".$cert_row['country_orig']."','".$cert_row['city_orig']."','".$cert_row['country_dest']."','".$cert_row['city_dest']."','".$cert_row['email']."',".$cert_row['Total_premium'].",".$cert_row['premium'].",".$cert_row['war'].",'".$cert_row['transhipment']."','".$cert_row['transhipment_location']."',".$cert_row['stamp'].",".$cert_row['levy'].",".$cert_row['p_fund'].",to_date('".$cert_row['p_from']."','YYYY-MM-DD'),to_date('".$cert_row['p_to']."','YYYY-MM-DD'),'N',0,".$sql_res['crate'].")";

                  

          
                    $ora_stmt=oci_parse($oraconn, $ora_sql);
                    $execute=oci_execute($ora_stmt);
                    oci_commit($oraconn);

                    if($execute){

                        echo $sql_proc="update certificates set processed=1 where id=".$certificate;

                        break;break;break;break;
                        $sql_proc_res=mysql_query($sql_proc);
                        if($sql_proc_res){
                            $response['status']=1;
                            echo json_encode($response);

                        }else{
                            $response['status']=0;
                            echo json_encode($response);
                        }

                   }

            

            ?>