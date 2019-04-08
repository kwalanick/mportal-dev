<?php
$code=$_POST['ucr'];
$ucr=$code.'SGISGI2017';
$token=hash('sha256', $ucr);
//echo $token;

$client = new SoapClient(
                "http://trial.kenyatradenet.go.ke/kesws/UCRValidationWebService?wsdl", 
                array(
                    'trace' => true
                    //'proxy_host'     => '',//'192.168.1.150',
                    //'proxy_port'     => '',//'3128',
                    //'stream_context' => stream_context_create(
                       // array(
                       //     'proxy' => "tcp://$PROXY_HOST:$PROXY_PORT",
                         //   'request_fulluri' => true,
                      //  )
                    )
                //)
            );

$xml = '<arg0><![CDATA[<UCR_Enquiry>
            <DocumentHeader>
            <msgid>894389438934984398</msgid>
            <refno>'.$code.'</refno>
            <msg_func>9</msg_func>
            <sender>SGI</sender>
            <receiver>KESWS</receiver>
            <version>1</version>
            </DocumentHeader>
            
            <DocumentDetails>
            <ucr_no>'.$code.'</ucr_no>
            <token>'.$token.'</token>
            </DocumentDetails>
            </UCR_Enquiry>]]></arg0>';
                

            $args =array(new SoapVar($xml, XSD_ANYXML));    
            $param = array('arg0' => $args[0]);

            $response = $client->__soapCall("ucrValidation", array($param));
            $data=new SimpleXMLElement($response->return);
            //var_dump($data);
            //echo "<br><br>";
            $ucr_valid=$data->DocumentDetails->status;

            If($ucr_valid=='VA'){

                $res['response']=1;
                echo json_encode($res);

            }else if($ucr_valid=='DE'){

                $res['response']=0;
                echo json_encode($res);

            }




















?>