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
				 $sql=mysql_query("
				 SELECT `case`.casecode,`case`.status,`case`.plotid,opendate,closedate,`client`.fname as cfn,
					`client`.lname as cln,`employee`.fname as efn,`employee`.lname as eln,
					plot.plotcode,plottype.typename,plot.price,plot.location,plot.features,plot.kanal,plot.marla,
					plot.kewat,plot.mouza,plot.khatooni,plot.khasra,plot.entrydate
				 FROM `case`
				 Left JOIN plot on `case`.plotid=`plot`.plotid
				 LEFT JOIN plottype on plot.plottype=plottype.typeid
				 Left JOIN `client` on `case`.clientid=client.clientid
				 LEFT JOIN `employee` on `case`.employeeid=employee.empid
				 where `case`.caseid='$id'") or die(mysql_error());
				 ?>
				<div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Documentaion Checklist</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="case.php"><i class="icon-arrow-left"></i> Back</a>    
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th>Date</th>
													<th>Document</th>
													<th>Status</th>
										   </tr>
									</thead>
									<tbody>
										<?PHP 
										$row = mysql_fetch_array($sql)
										?>
										
										<?php
									$query=mysql_query("SELECT `filetype`.`typename`,`files`.`location`,`uploaddate`
									FROM `filetype`
													LEFT JOIN `files` ON `files`.`type`=typeid
													where caseid=$id") or die(mysql_error());
									while($res=mysql_fetch_array($query)){
									?>
									<tr>
										<td><?php echo $res['uploaddate']; ?></td>
										<td><a href="../admin/<?php echo $res['location']; ?>"><?php echo ucwords($res['typename']); ?></a></td>
										<td><?php if($res['location']==''){
										echo 'Not Uploaded';
										}else{
										echo 'Uploaded';
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
					<div class="span3">
					<div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Case Details</div>
		                            </div>
		                            <div class="block-content collapse in">
									
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th></th>
													<th></th>
										   </tr>
									</thead>
									<tbody>
									
									<tr>
										<td>Case Code</td>
										<td><?php echo $row['casecode']; ?></td>
										</tr>
										<tr>
										<td>Plot Code</td>
										<td><a href="plotdetails.php?id=<?php echo $row['plotid']; ?>"><?php echo $row['plotcode']; ?></a></td>
										</tr>
										<tr>
										<td>Case Employer</td>
										<td><?php echo $row['efn']." ".$row['eln']; ?></td>
										</tr>
										<tr>
										<td>Purchaser</td>
										<td><?php echo $row['cfn']." ".$row['cln']; ?></td>
										</tr>
										<tr>
										<tr>
										<td>Opening Date</td>
										<td><?php echo $row['opendate']; ?></td>
										</tr>
										<tr>
										<td>Closing Date</td>
										<td><?php if($row['closedate']==''){
										echo "------";
										} else{
										echo $row['closedate']; }?></td>
										
										</tr>
										<tr>
										<td>Status</td>
										<td><?php echo ucwords($row['status']); ?></td>
										</tr>
										<tr>
										<td>Agency Fees & Dues</td>
										<td><a href="user_case_dues.php?id=<?php echo $id; ?>">Click here<a></td>
										</tr>
										<tr><td></td><td></td></tr>
									</tbody>
									</table>
									</div>
								</div>
								
					</div>
				 
				</div>
			</div>
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>