
<?php
$categ=$_POST['ship'];
$cover=$_POST['clause'];

include 'connect.php';
$sql="SELECT * FROM cargotype where container='$categ' and icc='$cover'";
$cargo_types = mysql_query($sql);
echo "<option value=''>Select Type</option>";
 
    while($row=mysql_fetch_array($cargo_types))
        {
        	
            //echo $row["ctype"];
            echo "<option value='$row[crate]'>".$row["ctype"]."</option>";
        }

?>


