<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li class=<?php echo $activeopen; ?>>
						<a href="dashboard.php">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>

					<li class=<?php echo $activeopen1; ?>>
						<a href="gencert.php">
							<i class="icon-text-width"></i>
							<span class="menu-text"> Generate Certificate </span>
						</a>
					</li>


					<!--<li class=<?php echo $activeopen9; ?>> 
						<a href="doc_upd.php">
							<i class="icon-list"></i>
							<span class="menu-text"> Upload Documents</span>
						</a>
					</li>-->

					<li class=<?php echo $activeopen2; ?>> 
						<a href="viewcert.php">
							<i class="icon-list"></i>
							<span class="menu-text"> View Certificates </span>
						</a>
					</li>
					

					<li class=<?php echo $activeopen6; ?>>
						<a href="endt.php">
							<i class="icon-picture"></i>
							<span class="menu-text"> Endorsements </span>
						</a>
					</li>



					<!--<li class=<?php echo $activeopen5; ?>>
						<a href="cltsms2.php">
							<i class="icon-calendar"></i>

							<span class="menu-text">
								Chats
							</span>
						</a>
					</li>-->
					<?php
					$user_ag = mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
					$row_ag=mysql_fetch_array($user_ag);
					$mail_ag=$row_ag['email'];

					$user_confirm_ag=mysql_query("select * from agmnf where email='".$mail_ag."'");
					$user_confirm_rows=mysql_num_rows($user_confirm_ag);

					if($user_confirm_rows > 0){

					//include 'adm_agent.php';

					}

					
					?>

					<?php
					$user_nav = mysql_query("SELECT * FROM users where id=".$_SESSION['userid']);
					$row_nav=mysql_fetch_array($user_nav);

					if($row_nav['admin']==1)
					{
                        
						include 'navbar_adm.php';

					}
					?>

					





					
						
<!--------->							
						</ul>
					</li>

				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>