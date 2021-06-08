                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">DHA File List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<form action="delete_dhaproperty.php" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
									<thead>
										  <tr>
													
													<th>File Code</th>
													<th>File Type</th>
													<th>Location</th>
													<th>Price</th>
													<th>File Case</th>
										   </tr>
									</thead>
									<tbody>
									
										<?PHP 
										$query=mysql_query("
										select `plot`.plotid,`casefile`.casefileid,`casefile`.status,plotcode,price,location,typename from plot 
										 INNER join plottype on plottype.typeid=plot.plottype
										 LEFT JOIN `casefile` ON  plot.plotid=`casefile`.plotid limit 0,18446744073709551615;") or die(mysql_error());


										while($row = mysql_fetch_array($query)){
										$id=$row['plotid'];
										$plotcode = $row['plotcode'];
										$price=$row['price'];
										$plottype=$row['typename'];
										$loc=$row['location'];
										$cid=$row['casefileid'];
										$status=$row['status'];
										?>
											<td><a href="dhafiledes.php?id=<?php echo $row['plotid']; ?>"><?php echo $plotcode; ?></a></td>
											<td><?php echo $plottype; ?></td>
											<td><?php echo $loc; ?></td>
											<td><?php echo $price; ?></td>
											<?php if(is_null($status)){
											?>
											<td>Case Not Opened</a></td>
											<?php }else if($status='open'){
											?>
											<td><a href="casefiledetails.php?id=<?php echo $cid; ?>"> View Case</a></td>
										<?php }else if($status='close'){ ?>
										<td><a href="casefiledetails.php?id=<?php echo $cid; ?>"> View Case</a></td>
										<?php } ?>
										</tr>
										<?php }?>
                               
                               
									</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    