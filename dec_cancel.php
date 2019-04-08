<?php
include 'connect.php';

$cert_id=$_POST['id'];

$eta= (new DateTime(date('Y-m-d H:i:s')))->format("dmYHis");

$sql_cert_det=mysql_query("select * from certificates where id=".$cert_id);
                $cert_det=mysql_fetch_array($sql_cert_det);


                //variables
                if($cert_det['agent_branch']==0){
                    $agency="Direct";
                    $pin=$cert_det['pin'];
                }else{
                    $agency=$cert_det['agent_branch'];
                    $sql_agt_pin=mysql_query("select * from agmnf where agent='$agency'");
                    $res=mysql_fetch_array($sql_agt_pin);
                    $pin=$res['pin'];
                }

                //generate hash
                //$code=$cert_det['ucr'];
                $request_no = filter_var($cert_det['k_response'], FILTER_SANITIZE_NUMBER_INT);
                $ucr=$request_no.'ACY';
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
                   <mci_cancel_request>
                  <msghdr>
                    <msgid>MC_CAN_REQ</msgid>
                    <refno>'.$cert_det['id'].'</refno>
                    <msg_func>9</msg_func>
                    <sender>ACY</sender>
                    <receiver>KESWS</receiver>
                    <version>1</version>
                    <docno>str1234</docno>
                    <docgroup>str1234</docgroup>
                    <msgdate>'.$eta.'</msgdate>
                    <token>'.$token.'</token>
                  </msghdr>
                  <mci_details>
                    <MCI_request_number>'.$request_no.'</MCI_request_number>
                    <mci_cert_number>SNL-'.$cert_det['id'].'</mci_cert_number>
                    <status>Cancellation_Approved</status>
                    <cancel_reason_code>str1234</cancel_reason_code>
                    <remarks>Cancelled</remarks>
                    <role_code>R_BA_PCO</role_code>
                    <submitted_by>ACY</submitted_by>
                    <account_code>str1234</account_code>
                    <submitted_date>'.$eta.'</submitted_date>
                  </mci_details>
                </mci_cancel_request>]]></arg0>';





            $args =array(new SoapVar($xml, XSD_ANYXML));    
            $param = array('arg0' => $args[0]);

              //echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";

	          //echo "console.log(".$xml.")";
	          //echo "</script>"; 

           




                      

            $response = $client->__soapCall("receiveMCISubmissionRequest", array($param));
            $data=new SimpleXMLElement($response->return);
            //var_dump($data);
            //echo "<br><br>";
            $ucr_valid=$data->mci_response->response->code;
            $kentrade_response=$data->mci_response->errors->error->description;

           if(trim($ucr_valid[0])=='F'){

              //echo "Failed to submit";
              $res['response']=0;
              echo json_encode($res);
            }else{
                

                //update the kentrade field
                $sql_upd="update certificates set cancellation='Y',k_cancell_resp='".$kentrade_response."' where id=".$cert_id;

                $res=mysql_query($sql_upd);

                if($res){

                $res['response']=1;
                echo json_encode($res);

                }

               
            	//echo " submit";

                
            }

           

//echo "REQUEST:\n" . htmlentities($client->__getLastRequest()) . "\n";
//echo "<br><br>";

//echo "REQUEST:\n" . htmlentities($client->__getLastResponse()) . "\n";

//var_dump($response->UCR_Response);

//var_dump($client->__getFunctions()); 
//var_dump($client->__getTypes()); 




?>