<?php
//echo "Start connecting  <br>";
$conn = oci_connect('STDGBDATA', 'oracle', '192.168.1.180/aims');
//if($conn){ echo " connected... "; }
//else{ echo " connection failed! "; }

/*$conn = oci_connect('TRDGBDATA', 'oracle', '(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = http://192.168.1.112)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = aims)
    )
  )');
if (!$conn) {
    echo "Sorry!!The Server is down!!Please try later...";
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
     echo "Server not responding!!!";
}else {
	echo "connection successful";
}*/

?>