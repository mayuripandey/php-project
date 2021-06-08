<!--- Block -->
<div id="block_bg" class="block" style="margin-top: 30px;">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Employees</div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
								<?php if(isset($_GET['delerr'])){
								echo $_GET['delerr'];} ?>
								<form action="delete_client.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#client_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<!-- Client delete modal -->
					<div id="client_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Delete Employee?</h3>
					</div>
					<div class="modal-body">
					<div class="alert alert-danger">
					<p>Are you sure you want to delete Employee you check?.</p>
					</div>
					</div>
					<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
					<button name="delete_client" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
					</div>
					</div>
										<thead>
										    <tr>
                                    <th></th>
                                    <th>Photo</th>
                                    <th>Employee Code</th>
                                    <th>Name </th>
									<th>Contact </th>
									<th></th>
                                    <th>Status</th>
                                </tr>
										</thead>
										<tbody>
												 <?php
                                    $query = mysql_query("select * from employee") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                    $id = $row['empid'];
                                    $teacher_stat = $row['status'];
                                        ?>
									<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                    <td width="40">
									<img class="img-circle" alt="images/no-image-found.jpg" onError="this.onerror=null;this.src='images/no-image-found.jpg';" src="<?php echo $row['picture']; ?>" height="50" width="50"></td> 
									<td> <?php echo $row['empcode']; ?></td>
									<td><?php echo $row['fname'] . " " . $row['lname']; ?></td> 
                                    <td><?php echo "Mob: ".$row['mobile']. "\n Landline: ". $row['landline'] ; ?></td> 
                               
									<td width="50"><a href="edit_client.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i></a></td>
									<?php if ($teacher_stat == 'active' ){ ?>
									<td width="120"><a href="de_activate_emp.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i> Deactivate</a></td>
									<?php }else{ ?>
									<td width="120"><a href="activate_emp.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-check"></i> Activated</a></td>				
									<?php } ?>
                                </tr>
                            <?php } ?>
                               
										</tbody>
									</table>
									</form>
								</div>
							</div>
							</div>
<!-- Block END-->
						