<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
<?php
$id=$_GET['id'];
$sql=mysql_query("select count(employeeid) as count from `case` where caseid=$id AND employeeid=$emp_id");
$res=mysql_fetch_array($sql);
if($res['count']<=0){
header("location: dhaproperties.php");
}
?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
         <div class="row-fluid">
					<?php include('sidebar_dhaproperty.php'); ?>
                <!--/span-->
			<div class="span6">
			     <?php
				 $id=$_GET['id'];
				 $sql=mysql_query("
				 SELECT `case`.casecode,`case`.status,`case`.plotid,opendate,closedate,`client`.fname as cfn,
					`client`.lname as cln,`employee`.fname as efn,`employee`.lname as eln,
					property.propertycode,plottype.typename,property.price,property.location,property.acre,
					property.kewat,property.mouza,property.khatooni,property.khasra,property.entrydate
				 FROM `case`
				 Left JOIN property on `case`.plotid=`property`.propertyid
				 LEFT JOIN plottype on property.propertytype=plottype.typeid
				 Left JOIN `client` on `case`.clientid=client.clientid
				 LEFT JOIN `employee` on `case`.employeeid=employee.empid
				 where `case`.caseid=$id") or die(mysql_error());
				 ?>
				<div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
								<?php
								if(isset($_GET['error'])){
								
								if($_GET['error']==0){
								?>
								<div class="alert alert-success" role="alert">File Successfully Uploaded</div>
								<?php
								}else{
								?>
								<div class="alert alert-danger" role="alert">Sorry!!! Something went wrong...</div>
								<?php
								}
								}
								?>
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Documents Checklist</div>
		                            </div>
		                            <div class="block-content collapse in">
									<button onclick="goBack()" class="btn btn-info"><i class="icon-arrow-left"></i>Go Back</button>

									<script>
										function goBack() {
												window.history.back()
														}
									</script>
									
									<form action="delete_case_uploadedfiles.php" method="post">
									
									<table cellpadding="0" cellspacing="0" border="0" class="table">
									
									<!--DELETE BUTTON AND MODEL-->
									
									
									<a data-toggle="modal" href="#case_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<!-- Case delete modal -->
					<div id="case_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Delete File?</h3>
					</div>
					<div class="modal-body">
					<div class="alert alert-danger">
					<p>Are you sure you want to delete file you check?.</p>
					</div>
					</div>
					<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
					<button name="delete_files" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
					</div>
					</div>
					
									<!--DELETE BUTTON AND MODEL-->
									
									<thead>
										  <tr>
													<th></th>
													<th>Document</th>
													<th>Date</th>
													<th>Status</th>
										   </tr>
									</thead>
									<tbody>
										<?PHP 
										$row = mysql_fetch_array($sql);
										$status=$row['status'];
										?>
										
										<?php
									$query=mysql_query("SELECT  fileid,`filetype`.`typename` ,  `files`.`location` ,  `uploaddate` 
										FROM  `filetype` 
										LEFT JOIN  `files` ON  `type` = typeid AND caseid =$id 
									order by `uploaddate` desc
									limit 0 , 333333333333 ;") or die(mysql_error());
									while($res=mysql_fetch_array($query)){
									?>
									
									<tr>
									<?php if(!is_null($res['location'])) { ?>
										<td width="30">
										<input name="caseid" type="hidden" value="<?php echo $id; ?>">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $res['fileid']; ?>">
										</td>
										<?php } else{ ?>
										<td></td>
										<?php } ?>
									<?php if(!is_null($res['location'])) { ?>
										<td>  <a href=" <?php echo $res['location']; ?> " target="_blank"><?php echo ucwords($res['typename']); ?></a></td>
										<?php } else { ?>
										<td> <?php echo ucwords($res['typename']); ?></td>
										<?php } ?>
										<td><?php if(!is_null($res['uploaddate'])){ echo $res['uploaddate']; } ?></td>
										<td><?php if($res['location']==''){
										echo 'Not Uploaded';
										}else{
										echo 'Uploaded';
										} ?></td>
									</tr>
										<?php } ?>
										
										</tbody>
									</table>
								</form>									
									</div>
		                            </div>
		         </div>
		               <!--DUES block -->
						<div class="block">
						<?php
						if(isset($_GET['errordues'])){
						if($_GET['errordues']>0){
						?>
						<div class="alert alert-danger" role="alert">Something went wrong!!</div>
						<?php
						}else{
						?>
						<div class="alert alert-success" role="alert">DONE!!!</div>
						<?php
						}}
						?>
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Agency Fees & Dues</div>
		                            </div>
		                            <div class="block-content collapse in">    
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th>Case Code</th>
													<th>Particulars</th>
													<th>Amount</th>
													<th>Status</th>
													<th></th>
										   </tr>
									</thead>
									<tbody>
										
										<?php
									$query=mysql_query("SELECT duesid,`duestype`.`typename`,`case`.`casecode`,`dues`.`amount`,`dues`.`status`
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
										<?php if($res['status']=='notrecieved'){ ?>
									<td width="120"><a href="duereceive.php?id=<?php echo $res['duesid']."&cid=$id"; ?>"><i class="icon icon-check"></i> Change Status</a></td>
									<?php }else{ ?>
									<td></td>				
									<?php } ?>
									</tr>
										<?php } ?>
										
									<?php if($status!='close'){ ?>
									
									<tr>
										<td><form name="dueaddform" method="GET" action="add_due.php"></td>
										<td><div class="control-group">
                                          <div class="controls">
                                            <select name="typeid" type="text">
											<?php
											$q=mysql_query("select * from duestype") or die(mysql_error());
											while($r=mysql_fetch_array($q)){
											?>
											<option value="<?php echo $r['typeid']; ?>"><?php echo $r['typename'] ?></option>
											<?php
											}
											?>
											</select>
                                          </div>
                                        </div></td>
										<td>
										<div class="control-group">
                                          <div class="controls">
										  <input value="<?php echo $id; ?>" type="hidden" name="caseid">
                                            <input name="amount" type="text" style="width: 50px;" required>
                                          </div>
                                        </div>
										</td>
										<td>
										<button class="btn btn-info" type="submit" >Submit</button></td>
										<td>
										</td>
									</tr>
									<?php } ?>
									</form>
										</tbody>
									</table>	
									</div>
		                </div>
						
						<!--DUES BLOCK END---->		
								
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
										<td>Property Code</td>
										<td><a href="plotdetails.php?id=<?php echo $row['plotid']; ?>"><?php echo $row['propertycode']; ?></a></td>
										</tr>
										<tr>
										<td>Case Hanndler</td>
										<td><?php echo $row['efn']." ".$row['eln']; ?></td>
										</tr>
										<tr>
										<td>Land Owner</td>
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
										<?php if($status!='close'){ ?>
										<tr><td colspan="2" style="text-align: center;"><a href="closecase.php?id=<?php echo $id; ?>" class="btn btn-info"><i class="icon icon-ok-sign"></i> &nbsp&nbsp Close Case</a></td></tr>
										<?php } ?>
										<tr><td></td><td></td></tr>
									</tbody>
									</table>
									</div>
								</div>
								
								
								
					</div>
				
				<!--File Section-->
				<?php if($status!='close'){ include('add_file_case.php'); } ?>
				<!--File Section Ending--> 
				</div>
				
			</div>
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>
</html>
