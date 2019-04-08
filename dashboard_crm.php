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
		
	<?php include "toptitle.php" ?>
	
	<link type="text/css" rel="stylesheet" href="styles2.css" />	
	</head>
	<body>
		
		<?php include "navbar.php"; ?>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php include "sidebar.php"; ?>

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
if(empty($agtn)){
    session_destroy();
    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "window.location = \"index.php\";";
    echo "</script>";
}
//sum up items
$tcomp=mysql_num_rows(mysql_query("select * from feedback"));
$tquote=mysql_num_rows(mysql_query("select * from quotations"));
$tsms=mysql_num_rows(mysql_query("select * from cltsms"));
$tfaq=mysql_num_rows(mysql_query("select * from faqs"));
$tinter=mysql_num_rows(mysql_query("select * from agmnf"));
$tclt=mysql_num_rows(mysql_query("select * from laclient"));

  ?>
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo number_format($tcomp); ?></h3>
                  <p>Complains</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo number_format($tquote); ?></h3>
                  <p>Quotations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo number_format($tsms); ?></h3>
                  <p>SMS</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo number_format($tfaq); ?></h3>
                  <p>FAQs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-navy">
                <div class="inner">
                  <h3><?php echo number_format($tinter); ?></h3>
                  <p>Intermediaries</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-lime">
                <div class="inner">
                  <h3><?php echo number_format($tclt); ?></h3>
                  <p>Clients</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>

<div class="span5">
<div class="widget-box">
<div class="widget-header widget-header-flat widget-header-small">
        <h5>
                <i class="icon-signal"></i>
                Portal Statistics
        </h5>

        <div class="widget-toolbar no-border">
                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                        Filters
                        <i class="icon-angle-down icon-on-right"></i>
                </button>

                <ul class="dropdown-menu dropdown-info pull-right dropdown-caret">
                        <li class="active">
                                <a href="#">This Week</a>
                        </li>

                        <li>
                                <a href="#">Last Week</a>
                        </li>

                        <li>
                                <a href="#">This Month</a>
                        </li>

                        <li>
                                <a href="#">Last Month</a>
                        </li>
                </ul>
        </div>
</div>

<div class="widget-body">
        <div class="widget-main">
                <div id="piechart-placeholder"></div>

                <div class="hr hr8 hr-double"></div>
<?php
$date = date('d/m/Y');
$prop = mysql_num_rows(mysql_query("SELECT * FROM proplist"));
$pol = mysql_num_rows(mysql_query("SELECT * FROM polmaster"));
$clm = mysql_num_rows(mysql_query("SELECT * FROM clhmn"));
?>
                <div class="clearfix">
                        <div class="grid3">
                                <span class="grey">
                                        <span class="label label-info arrowed-right arrowed-in">Proposals</span><br>
                                        &nbsp; Proposals<br>
                                </span>
                                <h4 class="bigger pull-left"><?php echo number_format($prop); ?></h4>
                        </div>

                        <div class="grid3">
                                <span class="grey">
                                    <span class="label label-info arrowed-right arrowed-in">Policies</span><br>
                                        &nbsp; Policies<br>
                                </span>
                                <h4 class="bigger pull-left"><?php echo number_format($pol); ?></h4>
                        </div>

                        <div class="grid3">
                                <span class="grey">
                                        <span class="label label-info arrowed-right arrowed-in">Claims</span><br>
                                        &nbsp; Claims<br>
                                </span>
                                <h4 class="bigger pull-left"><?php echo number_format($clm); ?></h4>
                        </div>
                </div>
        </div><!--/widget-main-->
</div><!--/widget-body-->
</div><!--/widget-box-->
</div>

                                                        
                                                        
<div >
		

<!--<table border="0" width="98%" align="center">
<tr>
    <th><div >
        COMPLAINS<br>
            <?php if($compl == 1){ ?><a href="complains2.php"><?php } ?><img src="images/faq2.png"></a><br>
            Clients/Intermediaries feedback
    </div></th>
    <th><div >
        QUOTATIONS<br>
            <?php if($qots == 1){ ?><a href="quotations2.php"><?php } ?><img src="images/report.png"></a><br>
            Generate Standard/Tender quotations
    </div></th>
    <th><div >
        SMS<br><br>
            <?php if($mkt == 1){ ?><a href="cltsms2.php"><?php } ?><img src="images/chat.png"></a><br><br><br><br>
            Send Short Messages to Clients/Intermediaries
    </div></th>
    </tr>
	
    <tr>
    <th><div >
        FAQs<br>
            <?php if($faqs == 1){ ?><a href="faqs2.php"><?php } ?><img src="images/faq1.png"></a><br>
            Frequently Asked Questions
    </div></th>
    <th><div >
        INTERMEDIARIES<br>
            <?php if($agts == 1){ ?><a href="agentlist2.php"><?php } ?><img src="images/agent.png"></a><br>
            Intermediaries listing
    </div></th>
    <th><div >
        CLIENTS<br>
            <?php if($clts == 1){ ?><a href="clientlist2.php"><?php } ?><img src="images/clients.png"></a><br>
            Clients listing
    </div></th>
</tr>
</table>-->

</div>					

												</div>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
								</div>
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

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
		<?php include "footer.php" ?>	
	</body>
</html>

