<?php

include 'connect.php';
$string=$_GET['query'];
$sql="SELECT  distinct AGENT,NAME from AGMNF where NAME like '".$string."%'  ";
$Results=mysql_query($sql);
$num_rows = mysql_num_rows($Results);
$counter=0;
echo "{";
	echo "\"results\":";
	echo "[";
while($row=mysql_fetch_array($Results)){
      $counter=$counter+1;
	 echo "{"; 

		echo "\"NAME\":";
		echo json_encode($row["NAME"]);
        echo ",";
		echo "\"AGENT\":";
		echo json_encode($row["AGENT"]);
		echo "}";
		if($num_rows-$counter>0){
    	echo ",";
    }

}
 echo "]";
    echo "}";


	?>