<?php
session_start();
?>

<table border="0" width="90%" align="center">

<?php
$batno = $_GET['batno'];
$agpol = mysql_query("SELECT * FROM certificates WHERE certid='$_SESSION['cert_id']'");
$count=1;
$determiner=2;
while($agprow=mysql_fetch_array($agpol)){
    if($bgcolor==$color1){$bgcolor=$color2;}
    else{$bgcolor=$color1;}
    echo "<tr><td width='20%'>&nbsp;</td><td>&nbsp;</td><tr>";
    echo "<tr><td></td><td align='left'>AIMS (U)LTD</td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'>".$agprow['id']."</td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'>".date('d M Y',strtotime($agprow['p_from']))."  12:00 AM</td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'>".date('d M Y',strtotime($agprow['p_to']))."  12:00 AM</td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'>".$agprow['shp_cover_type']." ".$agprow['make']."</td><tr>";
    if(!empty($agprow['fname'])){
        echo "<tr><td>&nbsp;</td><td align='left'>".$agprow['fname']." ".$agprow['sname']."</td><tr>";
    }
    else{
        echo "<tr><td>&nbsp;</td><td align='left'>".$agprow['cname']."</td><tr>";
    }
    echo "<tr><td>&nbsp;</td><td align='left'>".$agprow['covertype']."</td><tr>";
    echo "<tr><td>&nbsp;</td><td align='left'>".$agprow['issuedby']."</td><tr>";
    
}
?>

</table>

