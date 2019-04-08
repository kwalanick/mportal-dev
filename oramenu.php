
<?php //include 'oraconnect.php';
if(!$user){echo 'Login to AIMS First!!!';}
else{
$sdqry=oci_parse($conn,"SELECT PROG_ID FROM SDFILES WHERE SD_NAME='".$sd."'");
oci_execute($sdqry);
$sdrow=(oci_fetch_row($sdqry));
$progid=$sdrow[0];
//$image=$sdrow[1];

$sql=oci_parse($conn,"SELECT * FROM HELPPROGS WHERE PROG_ID='".$progid."'");
oci_execute($sql);
while (($srow=oci_fetch_array($sql,OCI_ASSOC))!=false){
	$level=$srow['PROG_LEVEL'];
	$pid=$srow['PID'];
	$hid=$srow['HID'];
	$nid=$srow['NID'];
	$mid=$srow['MID'];
	$lid=$srow['LID'];
	$wid=$srow['WID'];
	$tid=$srow['TID'];
	$yid=$srow['YID'];
	$zid=$srow['ZID'];
	$vid=$srow['VID'];
	$help=$srow['HELP_FLAG'];
}
if ($level==2){	$nid=$progid;}
		else if ($level==3){ $mid=$progid;}
		else if ($level==4){ $lid=$progid;}
		else if ($level==5){ $wid=$progid;}
		else if ($level==6){ $tid=$progid;}
		else if ($level==7){ $yid=$progid;}
		else if ($level==8){ $zid=$progid;}
		else if ($level==9){ $vid=$progid;}
	
	$qry1="SELECT * FROM HELPPROGS WHERE HID IS NULL AND HIDDEN=0 ORDER BY PROG_ID";
	$result1=oci_parse($conn,$qry1); //or die(oci_error());
	oci_execute($result1); 
	?>
	<ul class="nav nav-list">
		<?php while(($row=oci_fetch_array($result1, OCI_ASSOC))!=false){
		?>
		<li class=<?php echo $activeopen0; ?>>
		<span><a href="index.php?pid=<?php echo $row['PID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" class="dropdown-toggle">
		<i class="icon-text-width"></i>
		<span class="menu-text"> <?php echo $row['PROG_NAME'] ;?></span></a></span></li>
			<?php if ($pid==$row['PROG_ID']){
					$sql1=oci_parse($conn,"SELECT * FROM HELPPROGS WHERE PID='".$pid."' AND PROG_LEVEL=1 AND HIDDEN=0 ORDER BY PROG_ID");
					oci_execute($sql1);
				?>
				<ul style="list_style:none;" class="submenu">
				<?php while(($row=oci_fetch_array($sql1, OCI_ASSOC))!=false){
					?>
					<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $row['HID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
					<?php 
						
					if($hid==$row['PROG_ID']){
						$qry3="SELECT * FROM HELPPROGS  WHERE HID='".$hid."' AND PROG_LEVEL=2 AND HIDDEN='0' ORDER BY PROG_ID";
						$result3=oci_parse($conn,$qry3); //or die(oci_error());
						oci_execute($result3); 
						?>
						<ul style="list_style:none;" class="submenu">
						<?php while(($row=oci_fetch_array($result3, OCI_ASSOC))!=false){?>
						<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
							
							<?php 
							if($nid==$row['PROG_ID']){
							$qry4="SELECT * FROM HELPPROGS  WHERE NID='".$nid."' AND PROG_LEVEL=3 AND HIDDEN='0' ORDER BY PROG_ID";
							$result4=oci_parse($conn,$qry4); //or die(oci_error());
							oci_execute($result4); 
							?>
							<ul style="list_style:none;">
							<?php while(($row=oci_fetch_array($result4, OCI_ASSOC))!=false){?>
							<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
								<?php 
								if($mid==$row['PROG_ID']){
								$qry5="SELECT * FROM HELPPROGS  WHERE MID='".$mid."' AND PROG_LEVEL=4 AND HIDDEN='0' ORDER BY PROG_ID";
								$result5=oci_parse($conn,$qry5); //or die(oci_error());
								oci_execute($result5); 
								?>
								<ul style="list_style:none;">
								<?php while(($row=oci_fetch_array($result5, OCI_ASSOC))!=false){?>
								<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $mid; ?>&lid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
									<?php
									if($lid==$row['PROG_ID']){
									$qry5="SELECT * FROM HELPPROGS  WHERE LID='".$lid."' AND PROG_LEVEL=5 AND HIDDEN='0' ORDER BY PROG_ID";
									$result5=oci_parse($conn,$qry5); //or die(oci_error());
									oci_execute($result5); 
									?>
									<ul style="list_style:none;">
									<?php while(($row=oci_fetch_array($result5, OCI_ASSOC))!=false){?>
									<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $mid; ?>&lid=<?php echo $lid; ?>&wid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
										<?php
										if($wid==$row['PROG_ID']){
										$qry5="SELECT * FROM HELPPROGS  WHERE WID='".$wid."' AND PROG_LEVEL=6 AND HIDDEN='0' ORDER BY PROG_ID";
										$result5=oci_parse($conn,$qry5); //or die(oci_error());
										oci_execute($result5); 
										?>
										<ul style="list_style:none;">
										<?php while(($row=oci_fetch_array($result5, OCI_ASSOC))!=false){?>
										<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $mid; ?>&lid=<?php echo $lid; ?>&wid=<?php echo $wid; ?>&tid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
											<?php
											if($tid==$row['PROG_ID']){
											$qry5="SELECT * FROM HELPPROGS  WHERE TID='".$tid."' AND PRO_LEVEL=7 AND HIDDEN='0' ORDER BY PROG_ID";
											$result5=oci_parse($conn,$qry5); //or die(oci_error());
											oci_execute($result5); 
											?>
											<ul style="list_style:none;">
											<?php while(($row=oci_fetch_array($result5, OCI_ASSOC))!=false){?>
											<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $mid; ?>&lid=<?php echo $lid; ?>&wid=<?php echo $wid; ?>&tid=<?php echo $tid; ?>&yid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
												<?php
												if($yid==$row['PROG_ID']){
												$qry5="SELECT * FROM HELPPROGS  WHERE YID='".$yid."' AND PROG_LEVEL=8 AND HIDDEN='0' ORDER BY PROG_ID";
												$result5=oci_parse($conn,$qry5); //or die(oci_error());
												oci_execute($result5); 
												?>
												<ul style="list_style:none;">
												<?php while(($row=oci_fetch_array($result5, OCI_ASSOC))!=false){?>
												<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $mid; ?>&lid=<?php echo $lid; ?>&wid=<?php echo $wid; ?>&tid=<?php echo $tid; ?>&yid=<?php echo $yid; ?>&zid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
													<?php
													if($zid==$row['PROG_ID']){
													$qry5="SELECT * FROM HELPPROGS  WHERE ZID='".$zid."' AND PROG_LEVEL=9 AND HIDDEN='0' ORDER BY PROG_ID";
													$result5=oci_parse($conn,$qry5); //or die(oci_error());
													oci_execute($result5); 
													?>
													<ul style="list_style:none;">
													<?php while(($row=oci_fetch_array($result5, OCI_ASSOC))!=false){?>
													<li><span><a href="index.php?pid=<?php echo $pid; ?>&hid=<?php echo $hid; ?>&nid=<?php echo $nid; ?>&mid=<?php echo $mid; ?>&lid=<?php echo $lid; ?>&wid=<?php echo $wid; ?>&tid=<?php echo $tid; ?>&yid=<?php echo $yid; ?>&zid=<?php echo $zid; ?>&vid=<?php echo $row['PROG_ID']; ?>&help=<?php echo $row['HELP_FLAG']; ?>&user=<?php echo $user; ?>" > <?php echo $row['PROG_NAME'] ;?></a></span></li>
													<?php } ?>
													</ul>
													<?php } ?>
												<?php } ?>
												</ul>
												<?php } ?>
											<?php } ?>
											</ul>
											<?php } ?>
										<?php } ?>
										</ul>
										<?php } ?>
									<?php } ?>
									</ul>
									<?php } ?>
								<?php } ?>
								</ul>
				
								<?php } ?> 
							<?php } ?>
							</ul>
				
							<?php } ?>
						<?php } ?>
						</ul>
					<?php } ?>
				<?php }?>
				</ul>
		<?php } ?>
		<?php } ?>
	</ul>
	<?php } ?>
