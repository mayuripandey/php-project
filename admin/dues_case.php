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
										<form name="dueaddform" method="GET" action="add_due.php">
									<?php if($status!='close'){ ?>
									<tr>
										<td></td>
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
										<td><div class="control-group">
                                          <div class="controls">
										  <input value="<?php echo $id; ?>" type="hidden" name="caseid">
                                            <input name="amount" type="text" style="width: 50px;" required>
                                          </div>
                                        </div></td>
										<td><button type="submit" class="btn btn-info">Submit</button></td>
										<td></td>
									</tr>
									<?php } ?>
									</form>
										</tbody>
									</table>	
									</div>
		                </div>
						
						<!--DUES BLOCK END---->		