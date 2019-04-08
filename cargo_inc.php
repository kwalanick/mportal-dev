<center> <table border="0"   >

<?php
include "connect.php";
//$agpol = mysql_query("SELECT * FROM certificates WHERE certid=".$_SESSION['certificate']);
$sql="SELECT * FROM certificates WHERE id=".$_SESSION['certificate'];
$agpol = mysql_query($sql);
while($agprow=mysql_fetch_array($agpol)){
    //echo "<tr><td width='10%'>&nbsp;</td><td>&nbsp;</td><tr>";
    $cargo_cat = mysql_query("SELECT * FROM cargocat where catid=".$agprow['category']);
    $rowcat=mysql_fetch_array($cargo_cat);
    $category=$rowcat['category'];

    $cargo_type = mysql_query("SELECT * FROM cargotype where ctypeid=".$agprow['cargo_type']);
    $rowtype=mysql_fetch_array($cargo_type);
    $cargo_type=$rowtype['ctype'];


    
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['vessel']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['vessel_no']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['country_orig']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['country_dest']."</strong></td><tr>";

     echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['city_orig']."</strong></td><tr>";
      echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['city_dest']."</strong></td><tr>";
    //echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$category."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$cargo_type."</strong></td><tr>";
    
}
?>

</table></center>
