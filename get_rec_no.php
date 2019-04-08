<?php 

$categ=$_POST['id'];
include 'connect.php';
$sql="SELECT * FROM users where id=$categ";
$cargo_types = mysql_query($sql);
//echo "<option selected='selected'>Select Type</option>";
 
    while($row=mysql_fetch_array($cargo_types,MYSQL_ASSOC))
        {
            echo $row["mobile_no"];
            //echo "<option value='$row[crate]'>".$row["ctype"]."</option>";
        }


 ?>