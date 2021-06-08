                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Property List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th></th>
													<th>Plot Code</th>
													<th>Property Type</th>
													<th>Location</th>
													<th>Price</th>
										   </tr>
									</thead>
									<tbody>
										<?PHP 
										$query=mysql_query("
										select plotid,plotcode,price,location,typename from plot 
										 Left join plottype on plottype.typeid=plot.plottype;") or die(mysql_error());


										while($row = mysql_fetch_array($query)){
										$plotcode = $row['plotcode'];
										$price=$row['price'];
										$plottype=$row['typename'];
										$loc=$row['location'];
										?>
											<td></td>
											<td><a href="plotdescription.php?id=<?php echo $row['plotid']; ?>"><?php echo $plotcode; ?></a></td>
											<td><?php echo $plottype; ?></td>
											<td><?php echo $loc; ?></td>
											<td><?php echo $price; ?></td>
										</tr>
										<?php }?>
                               
                               
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    