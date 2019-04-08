<center> <table border="0"   style="float: left;">

<?php
include "connect.php";
//$agpol = mysql_query("SELECT * FROM certificates WHERE certid=".$_SESSION['certificate']);
$sql="SELECT * FROM certificates WHERE id=".$_SESSION['certificate'];
$agpol = mysql_query($sql);
while($agprow=mysql_fetch_array($agpol)){
    //echo "<tr><td width='10%'>&nbsp;</td><td>&nbsp;</td><tr>";
    //echo "<tr><td></td><td align='left'><strong style='font-size: 15px;'>AMARCO LIMITED </strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['id']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['p_from']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['p_to']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['shp_cover_type']." ".$agprow['make']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['package_type']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['sum_insured']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['Total_premium']."</strong></td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'><strong style='font-size: 15px;'>".$agprow['owner']."</strong></td><tr>";
    
}
?>

</table></center>
