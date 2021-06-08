                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Property List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<form action="delete_dhaproperty.php" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
									<thead>
										  <tr>
													
													<th>Property Code</th>
													<th>Property Type</th>
													<th>Location</th>
													<th>Price</th>
													<th>Case</th>
										   </tr>
									</thead>
									<tbody>
										<?PHP 
										$query=mysql_query("
										select employeeid,propertyid,`case`.caseid,`case`.status,propertyid,propertycode,price,location,typename from property 
										 INNER join plottype on plottype.typeid=property.propertytype
										 LEFT JOIN `case` ON  property.propertyid=`case`.plotid limit 0,18446744073709551615;") or die(mysql_error());


										while($row = mysql_fetch_array($query)){
										$id=$row['propertyid'];
										$plotcode = $row['propertycode'];
										$price=$row['price'];
										$plottype=$row['typename'];
										$loc=$row['location'];
										$cid=$row['caseid'];
										$status=$row['status'];
										$empid=$row['employeeid'];
										?>
											<td><a href="dhapropertydes.php?id=<?php echo $row['propertyid']; ?>"><?php echo $plotcode; ?></a></td>
											<td><?php echo $plottype; ?></td>
											<td><?php echo $loc; ?></td>
											<td><?php echo $price; ?></td>
											<?php if(is_null($status)){
											?>
											<td>Case Not Opened</a></td>
											<?php }else if($status='open' && $empid==$emp_id){
											?>
											<td><a href="casedetails.php?id=<?php echo $cid; ?>"> View Case</a></td>
										<?php }else if($status='close' && $empid==$emp_id){ ?>
										<td><a href="casedetails.php?id=<?php echo $cid; ?>"> View Case</a></td>
										<?php } else { ?>
										<td>Not Allowded</td>
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
                    