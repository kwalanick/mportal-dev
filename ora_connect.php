<?php
 $oraconn = oci_connect('aims', 'oracle', '(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.180)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = aims)
    )
  )');

 
//if (!$oraconn) { echo "Not connected";
    //$e = oci_error();
    //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
//} else { echo "Connected to DB"; }
	

?>

