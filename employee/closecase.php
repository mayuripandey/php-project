



<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
			<?php

if(isset($_POST['total'])){
$total=$_POST['total'];
$dhaplot=$_POST['file_dha'];
$caseid=$_GET['id'];
$medi=$_POST['file_medlink'];
$clientplot=$_POST['file_client'];
$share=$_POST['share'];
$amt=$_POST['amount'];
$query=mysql_query("INSERT INTO `case_summary`
		(`dhaplots`, `plotgenerated`, `caseid`, `medlinkplots`, `clientplots`, `totalprice`, `share`)
			VALUES ($dhaplot,$total,$caseid,$medi,$clientplot,$amt,$share)") or die(mysql_error());
mysql_query("update `case` set status='close',closedate='".date('Y-m-d')."'where caseid=$caseid;")  or die(mysql_error());
mysql_query("update `property` set status='sold' where propertyid=(select plotid from `case` where caseid=$caseid);");
header("location: casedetails.php?id=$caseid");
}
?>
					<?php include('sidebar_dhaproperty.php'); ?>
                <!--/span-->
             
			<div class="span4" style="margin-left: 0px">
			     <!-- Inner -->
			     <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">
							Case Closing</div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
								<form method="post" name="asas">
								<div class="control-group">
                                          <div class="controls">
                                            <input name="amount" class="input focused" id="focusedInput" type="text" placeholder = "Final Price" required>
                                          </div>
                                </div>
								<div class="control-group">
                                          <div class="controls">
                                            <input name="share" class="input focused" id="focusedInput" type="text" placeholder = "Medlink's Share" required>
                                          </div>
                                </div>
								<div class="control-group">
                                          <div class="controls">
                                            <input name="total" class="input focused" id="focusedInput" type="text" placeholder = "Total Files" required>
                                          </div>
                                </div>
								<div class="control-group">
                                          <div class="controls">
                                            <input name="file_medlink" class="input focused" id="focusedInput" type="text" placeholder = "Medlinks Files" required>
                                          </div>
                                </div>
								<div class="control-group">
                                          <div class="controls">
                                            <input name="file_client" class="input focused" id="focusedInput" type="text" placeholder = "Client Files" required>
                                          </div>
                                </div>
								<div class="control-group">
                                          <div class="controls">
                                            <input name="file_dha" class="input focused" id="focusedInput" type="text" placeholder = "DHA Files" required>
                                          </div>
                                </div>
								<div class="control-group">
                                          <div class="controls">
                                            <Button name="close_btn"  type="submit" class="btn btn-success"><span class="icon icon-ok"></span> Close Case</button>
                                          </div>
                                </div>
								</form>
								</div>
							</div>
				</div>
			</div>
				 <!-- Inner -->
			</div>
			</div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>