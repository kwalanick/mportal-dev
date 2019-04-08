<?php
session_start();
$user_id = $_SESSION['userid'];
$name = $_SESSION['fname'];
$adm = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="styles2.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="D.Kanja" />
<link rel="shortcut icon" href="images/docimg.jpg"></link>
<link rel="icon" type="image/jpeg" href="images/docimg.jpg"></link>
<title>AimsCrm</title>
<link type="text/css" rel="stylesheet" href="styles.css" />
<style type="text/css">
body{
visibility:inherit;
}
.printthis{
visibility:visible;
}
</style>
<script language="javascript">
/*function closeprint(){
window.location=home.php;
}*/
function fnPrintArea()
{
var DocumentContainer = document.getElementById('print_this');
var WindowObject = window.open('', "printarea", 
"width=850,height=850,top=200,left=250,toolbars=no,scrollbars=yes,status=no,resizable=no");
    WindowObject.document.writeln('<!DOCTYPE html>');
    WindowObject.document.writeln('<html><head><title></title>');
    WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="styles.css" media="print">');
    WindowObject.document.writeln('<style type="text/css">body{ background:#FFF;} </style>');
    WindowObject.document.writeln('</head><body>');
    WindowObject.document.writeln(DocumentContainer.innerHTML);
    WindowObject.document.writeln('</body></html>');
WindowObject.document.close();
WindowObject.focus();
WindowObject.print();
WindowObject.close();
}
</script>

	<?php include "toptitle.php" ?>


	<body>
		
		<?php include "navbar.php"; ?>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php 
				$activeopen5 = "active open";
                //$active4 = "active";
                 include "sidebar.php"; 
             ?>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li class="active"></li>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							
<?php $active10 = 1;
include "banner.php";
		?>



<!--&nbsp;&nbsp;<a href="excelcreg.php"><img src="images/excel.png" width="20" height="18" /></a>-->
<table class="table table-striped table-bordered" align="center">
<form action="" method="post" >
<tr bgcolor="<?php echo $color2; ?>">
<th>Recipient:<br /><select name="recipient" id="recipient" required>

<?php
//include 'connect.php';
$sql="SELECT * FROM users";
$cargo_types = mysql_query($sql);
echo "<option selected='selected'>Select User</option>";
 
    while($row=mysql_fetch_array($cargo_types,MYSQL_ASSOC))
        {
            //echo $row["ctype"];
            echo "<option value='$row[id]'>".$row["username"]."</option>";
        }

?>




</select></th>
<!--<th>Mobile number<br /><input type="text" name="recmobile" id="recmobile" size="14" maxlength="12" />-->
<th>Message:<br /><textarea name="message" rows="2" cols="50" placeholder="Type your message here" required></textarea></th>
<td><br /><input type="submit" name="send" value="Send" /></td>
</tr>
</form>

<!--<form action="" method="post" name="uploadsms" enctype="multipart/form-data" >
<tr bgcolor="<?php echo $color1; ?>">
<th colspan="2">Upload using excel:<br /> 
<input type="file" name="excsms" id="file" required  />

</th>
<td colspan="2"><input type="submit" name="uplsms" value="upload" /></td>
</tr>
</form>-->
</table>
    <hr width="80%">
<?php
if($_POST['send']){
$rectype = $_POST['recipient']; 
$spno = $_POST['recmobile'];
$mess = $_POST['message'];
$sql_snd="INSERT INTO cltsms(`category`, `receiver`, `message`, `createdate`, `sentdate`, `status`, `creator`) VALUES('Custom',$spno,'$mess',NOW(),NOW(),'send',".$_SESSION['userid'].")";
$nwsms = mysql_query($sql_snd);

if($nwsms){
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
         echo "alert('kabisa')";
         echo "</script>";
}else{
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
         echo "alert('lol')";
         echo "</script>";

}

}

//upload messages from excel file
if($_POST['uplsms']){
$date = date("d/m/Y");
$upfile = $_FILES['excsms']['name'];

echo 
"Sent file:  ".$_FILES['excsms']['name'].  
"<br>File size:  ".$_FILES['excsms']['size']. 
"<br>File type:  ".$_FILES['excsms']['type'] ;

move_uploaded_file( $_FILES['excsms']['tmp_name'], "uploads/". $_FILES["excsms"]["name"] ) or 
           die( "<br>Could not copy file!");

$filepath = "uploads/".$upfile;
//table class
//mysql_query("TRUNCATE TABLE laclient") or die(mysql_error());
mysql_query("LOAD DATA LOCAL INFILE '$filepath' IGNORE
INTO TABLE cltsms
Fields terminated by ',' ENCLOSED BY '\"'
LINES terminated by '\n'(
receiver,message
			)")
or die("<br>Import Error: " . mysql_error());

mysql_query("UPDATE cltsms SET category='Custom',createdate='$date',sentdate=NOW(),status='send',creator='$agtn' WHERE status=''");

echo "<br>Upload successful<br>";
}
?>
    
    <div id="propfr">
<div class="printthis">
<div id="print_this">

        <div class="table-header">
                <center>Chats</center>
        </div>
<table id="sample-table-2" class="table table-striped table-bordered table-hover" align="center">

<thead>
<tr align='right' bgcolor="<?php echo $bgcolor; ?>">
<th width="15%">Sender</th>
<th width="15%" >Receiver</th>
<th width="35%" >Message</th>
<th width="15%">Date created</th>
<th width="10%">Date Sent</th>
<th width="10%">Status</th>

</tr>
</thead>
<tbody>
<?php
 $mobile_no = mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
while($rowno=mysql_fetch_array($mobile_no)){
echo $my_number=$rowno['mobile_no'];
}


 $cltreg = mysql_query("SELECT * FROM cltsms where creator=".$_SESSION['userid']."  or receiver=".$my_number." ORDER BY smsid DESC");
    
while($crrow=mysql_fetch_array($cltreg)){
if($bgcolor==$color1){$bgcolor=$color2;}
else{$bgcolor=$color1;}

echo "<tr>";	

$sender= mysql_query("SELECT * FROM users where id=".$crrow['creator']);
$row_send=mysql_fetch_array($sender);
echo "<td align='center'>".$row_send['username']."</td>";
//echo "<td>".$crrow['creator']."</td>";



$receiver= mysql_query("SELECT * FROM users where mobile_no=".$crrow['receiver']);
$row_rec=mysql_fetch_array($receiver);
echo "<td align='center'>".$row_rec['username']."</td>";




//echo "<td align='center'>".$crrow['receiver']."</td>";



echo "<td>".$crrow['message']."</td>";
echo "<td>".$crrow['createdate']."</td>";
echo "<td>".$crrow['sentdate']."</td>";
echo "<td>".$crrow['status']."</td>";
//if($crrow['status'] == 'send'){
//echo "<td><a href='editcltsms?csmsid=$crrow[smsid]'><img src='images/pencil.png' width='15' height='15'></a> | ";
//echo "<a href='delcltsms?csmsid=$crrow[smsid]'><img src='images/delete.png' width='15' height='15'></a></td>";
//}
//else{ echo "<td></td>"; }
echo "</tr>";	
}
?>
</tbody>
</table>
</div>
</div>
</div>




			<!--END DIV CONTENT cltsms.php-->				
							
						
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

<!--page specific plugin scripts-->
<script type="text/javascript">
            $(document).ready( function () {
                        $('#sample-table-2').DataTable({
                            
                        } );
                    } );

        </script>
         <script type="text/javascript">

        jQuery(document).ready(function()
        {

            $("select#recipient").change(function()
            {
                var id=$("select#recipient option:selected").attr('value');
                
        

                    $.ajax({
                        url:"get_rec_no.php",
                        data:"id="+id,
                        type:"post",
                        success:function(resp){
                        	//alert(resp);
                            //$("input#recmobile").html(resp);
                            document.getElementById("recmobile").value=resp;
                        },
                        error:function(resp){}

                    });
            

            });
        });


    </script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
		<?php include "footer.php" ?>	
	</body>
</html>
