<?php  include('header_dashboard.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
         <div class="row-fluid">
					<?php include('sidebar_case.php'); ?>
                <!--/span-->
			<div class="span6">
			     <?php
				 $id=$_GET['id'];
				 ?>
				<div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Agency Fees & Dues</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="casedetails.php?id=<?php echo $id; ?>"><i class="icon-arrow-left"></i> Back</a>    
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th>Case</th>
													<th>Particulars</th>
													<th>Amount</th>
													<th>Status</th>
										   </tr>
									</thead>
									<tbody>
										<?PHP 
										$row = mysql_fetch_array($sql)
										?>
										
										<?php
									$query=mysql_query("SELECT `duestype`.`typename`,`case`.`casecode`,`dues`.`amount`,`dues`.`status`
									FROM `dues`
									INNER JOIN `duestype` ON `dues`.`duestype`=`duestype`.`typeid`
									INNER JOIN `case` ON `dues`.`caseid`=`case`.`caseid`
									INNER JOIN `client` ON client.clientid=`dues`.clientid
									where `dues`.caseid=$id") or die(mysql_error());
									while($res=mysql_fetch_array($query)){
									?>
									<tr>
										<td><?php echo $res['casecode']; ?></td>
										<td><?php echo $res['typename']; ?></td>
										<td><?php echo $res['amount']; ?></td>
										<td><?php if($res['status']=='notrecieved'){
										echo 'Payment Pending';
										}else{
										echo 'Payment Received';
										} ?></td>
									</tr>
										<?php } ?>
										</tbody>
									</table>	
									</div>
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
			</div>
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>