<?php

//generate policy number

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

         echo $policy_no;

         ?>