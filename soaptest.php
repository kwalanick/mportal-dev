<?php
include 'connect.php';

$cert_id=151;//$_POST['id'];

$sql_cert_det=mysql_query("select * from certificates where id=".$cert_id);
                $cert_det=mysql_fetch_array($sql_cert_det);


                //variables
                if($cert_det['agent_branch']==0){
                    $agency="Direct";
                    $pin='A000091600P'; //$cert_det['pin'];
                }else{
                    $agency=$cert_det['agent_branch'];
                    $sql_agt_pin=mysql_query("select * from agmnf where agent='$agency'");
                    $res=mysql_fetch_array($sql_agt_pin);
                     $pin='A000091600P'; //$cert_det['pin'];
                }

                //generate hash
                //$code=$cert_det['ucr'];
                $ucr=$cert_det['id'].'ACY';
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

         
 $xml='<arg0><![CDATA[<?xml version="1.0" encoding="utf-8"?> 
            <mcirequest> 
            <msghdr> 
            <msgid>OG_MCI_REQ</msgid> 
            <refno>'.$cert_det['id'].'</refno>
            <msg_func>9</msg_func> 
            <sender>ACY</sender> 
            <receiver>KESWS</receiver> 
            <version>1</version> 
            <docno>str1234</docno> 
            <docgroup>str1234</docgroup> 
            <msgdate>28082017031529</msgdate> 
            <token>'.$token.'</token> 
             </msghdr> 
             <mci_details> 
             <request_number>'.$cert_det['id'].'</request_number>
             <ver_no>1</ver_no> 
             <importer_pin>'.$pin.'</importer_pin> 
             <importer_type>'.$agency.'</importer_type> 
             <broker_name>Direct</broker_name> 
             <broker_pin>'.$pin.'</broker_pin> 
             <ucr_code>'.$cert_det['ucr'].'</ucr_code>
            <origin_country>'.$cert_det['country_orig'].'</origin_country> 
             <destination_country>'.$cert_det['country_dest'].'</destination_country>
             <origin_port>'.$cert_det['city_orig'].'</origin_port> 
             <destination_port>'.$cert_det['city_dest'].'</destination_port> 
             <mci_issuer>African Merchant Assurance Company Ltd</mci_issuer> 
             <rotation_number>728</rotation_number> 
             <vessel_name>'.$cert_det['vessel'].'</vessel_name> 
             <voyage_number>'.$cert_det['country_orig'].'</voyage_number>
             <eta>28082017031529</eta> 
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
             <country>'.$cert_det['tranship_country'].'</country> 
             <quantity>1</quantity> 
             <vessel_name>'.$cert_det['vessel'].'</vessel_name> 
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
             <CIF>'.$cert_det['cif'].'</CIF> 
             <CIF_NCY>32</CIF_NCY> 
             </items> 
             <items>
             <itemSeq_num>2</itemSeq_num> 
             <goods_desc>'.$cert_det['cargo_type'].'</goods_desc> 
             <quantity>1</quantity> 
             <uom>4A</uom> 
             <package_type>1A</package_type> 
             <marks_numbers>str1234</marks_numbers> 
             <origin_country>'.$cert_det['country_orig'].'</origin_country> 
             <currency_code>KES</currency_code> 
             <CIF>'.$cert_det['cif'].'</CIF> <CIF_NCY>700</CIF_NCY> 
             </items> 
             <documents> 
             <doc_name>str1234</doc_name> 
             <doc_code>str1234</doc_code> 
             <file_name>str1234</file_name> 
             </documents> 
             <mci_internal_number>SNL-'.$cert_det['id'].'</mci_internal_number> 
             <mci_certificate_number>'.$cert_det['id'].'</mci_certificate_number> 
             <policy_number>'.$cert_det['policy_no'].'</policy_number> 
             <premium_amount>'.$cert_det['premium'].'</premium_amount> 
             <policy_holders_fund>'.$cert_det['p_fund'].'</policy_holders_fund> 
             <stamp_duty>'.$cert_det['stamp'].'</stamp_duty>
             <training_levy>'.$cert_det['levy'].'</training_levy> 
             <total_premium>'.$cert_det['Total_premium'].'</total_premium> 
             <sum_insured>'.$cert_det['sum_insured'].'</sum_insured> 
             <servey_agents>344</servey_agents> 
             <approval_type>Bank</approval_type>  
             <role_code>R_BA_PCO</role_code> 
             <remarks>NA</remarks> 
             <status>Approved</status>  
             <created_date>10052017123412</created_date> 
             <endrosement> 
             <transferee_pin>A000091600P</transferee_pin> 
             <transferee_ucr>'.$cert_det['ucr'].'</transferee_ucr> 
             </endrosement> 
             </mci_details> 
             </mcirequest> ]]></arg0>';



            $args =array(new SoapVar($xml, XSD_ANYXML));    
            $param = array('arg0' => $args[0]);

              echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";

	          echo "console.log(".$xml.")";
	          echo "</script>";           

            $response = $client->__soapCall("receiveMCISubmissionRequest", array($param));
            $data=new SimpleXMLElement($response->return);
            var_dump($data->mci_response->errors);
            //echo "<br><br>";
            $ucr_valid=$data->mci_response->response->code;

            if(trim($ucr_valid[0])=='F'){

              echo $data->mci_response->errors->error->description;

              echo "<br>";

              echo "Failed to submit";

            }else{

            echo $data->mci_response->errors->error->description;

              
                
            }

           

//echo "REQUEST:\n" . htmlentities($client->__getLastRequest()) . "\n";
//echo "<br><br>";

//echo "REQUEST:\n" . htmlentities($client->__getLastResponse()) . "\n";

//var_dump($response->UCR_Response);

//var_dump($client->__getFunctions()); 
//var_dump($client->__getTypes()); 


?>