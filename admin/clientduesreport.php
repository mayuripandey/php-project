<?php $id=$_GET['clientid']; ?>
<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		 <?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_report.php'); ?>
		  
			<div class="span6">
						<div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Agency Fees & Dues</div>
		                            </div>
		                <div class="block-content collapse in">			
								 <a href="printclientduesreport.php?id=<?php echo $id; ?>" target="_BLANK">Print Page</a>
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th>Case Code</th>
													<th>Particulars</th>
													<th>Amount</th>
													<th>Status</th>
													
										   </tr>
									</thead>
									<tbody>
										
									<?php
									$query=mysql_query("SELECT duesid,`duestype`.`typename`,`case`.`casecode`,`dues`.`amount`,`dues`.`status`
									FROM `dues`
									INNER JOIN `duestype` ON `dues`.`duestype`=`duestype`.`typeid`
									INNER JOIN `case` ON `dues`.`caseid`=`case`.`caseid`
									INNER JOIN `client` ON client.clientid=`dues`.clientid
									where `dues`.clientid=$id") or die(mysql_error());
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
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>