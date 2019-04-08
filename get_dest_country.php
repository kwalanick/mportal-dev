<?php
$country=$_POST['id'];
include 'connect.php';
$sql="SELECT * FROM country where country_code not in('$country')";
$inchi = mysql_query($sql);
//echo "<option selected='selected'>Select country</option>";
 
    while($row=mysql_fetch_array($inchi))
        {
            //echo $row["ctype"];
            echo "<option value='$row[country_code]'>".$row["name"]."</option>";
        }

?>