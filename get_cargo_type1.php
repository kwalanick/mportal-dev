
<?php
$categ=$_POST['ship'];
$cover=$_POST['clause'];

include 'connect.php';
$sql="SELECT * FROM cargotype where container='$categ' and icc='$cover'";

$cargo_types = mysql_query($sql);

 
    while($row=mysql_fetch_array($cargo_types,MYSQL_ASSOC))
        {
            //echo $row["ctype"];
            echo "<option selected='selected' value='$row[ctypeid]'>".$row["ctype"]."</option>";
        }

?>
