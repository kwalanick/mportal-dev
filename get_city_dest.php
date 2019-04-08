<?php
$city=$_POST['id'];
include 'connect.php';
$sql="SELECT * FROM city where country_code='$city'";
$towns = mysql_query($sql);
echo "<option selected='selected'>Select Type</option>";
 
    while($row=mysql_fetch_array($towns))
        {
            //echo $row["ctype"];
            echo "<option value='$row[port_code]'>".$row["port_name"]."</option>";
        }

?>