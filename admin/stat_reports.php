<?php

?>
<!-- Stack Reports-->

 <div class="span2" style="margin-left: 0px;">
 <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><a href="report_table.php">DHA Property Stock Reports </a></br> (<?php echo(date("F")); ?>)</div>
                            </div>
                            <div class="block-content collapse in" style=" min-height: 100px">
                                <div class="span12">
								<ul>
								<?php
								$sql=mysql_query("select entrydate from property 
									where entrydate>= '" . date("y-m-01")."';") or die(mysql_error());
								$in=mysql_num_rows($sql);
								?>
								<li>Total Stock In:  <?php echo $in; ?> </li>
							<?php 	
							$sql=mysql_query("select entrydate from property 
							where status='sold' and entrydate>= '" . date("y-m-01")."';") or die(mysql_error());
							$out=mysql_num_rows($sql); ?>
								<li> Total Stock Out: <?php echo $out; ?> </li>
								<li> Stock Remaining: <?php echo $in-$out; ?> </li>
								</ul>
								</div>
							</div>
</div>
</div>

<!-- Case Reports -->
 <div class="span2" style="margin-left: 10px">
 <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><a href="property_case_report.php">DHA Property Case Reports</a></br> (<?php echo(date("F")); ?>)</div>
                            </div>
                            <div class="block-content collapse in" style=" min-height: 100px">
                                <div class="span12">
								<ul>
								<?php
									$sql1=mysql_query("select * from `case` where status ='open' AND opendate>= '" . date("y-m-01")."';") or die(mysql_error());
									$open=mysql_num_rows($sql1);
								?>
								<li>Case Opened:  <?php echo $open; ?></li>
								<?php
									$sql=mysql_query("select closedate from `case` 
										where status='close' and closedate>= '" . date("y-m-01")."';") or die(mysql_error());
									$close=mysql_num_rows($sql);
								?>
								<li>Cases Closed:  <?php echo $close; ?></li>
								</ul>
								</div>
							</div>
</div>
</div>
<!--DHA FILE STOCK REPORT-->

 <div class="span2" style="margin-left: 10px" >
 <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><a href="stock_casefile_table.php">DHA FILE Stock Reports </a></br> (<?php echo(date("F")); ?>)</div>
                            </div>
                            <div class="block-content collapse in" style=" min-height: 100px">
                                <div class="span12">
								<ul>
								<?php
								$sql=mysql_query("select entrydate from plot 
									where entrydate>= '" . date("y-m-01")."';") or die(mysql_error());
								$in=mysql_num_rows($sql);
								?>
								<li>Total Stock In:  <?php echo $in; ?> </li>
							<?php 	
							$sql=mysql_query("select entrydate from plot 
							where status='sold' and entrydate>= '" . date("y-m-01")."';") or die(mysql_error());
							$out=mysql_num_rows($sql); ?>
								<li> Total Stock Out: <?php echo $out; ?> </li>
								<li> Stock Remaining: <?php echo $in-$out; ?> </li>
								</ul>
								</div>
							</div>
</div>
</div>

<!--Case File case Report-->
 <div class="span2" style="margin-left: 10px">
 <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><a href="file_case_report.php">DHA File Case Reports</a></br> (<?php echo(date("F")); ?>)</div>
                            </div>
                            <div class="block-content collapse in" style=" min-height: 100px">
                                <div class="span12">
								<ul>
								<?php
									$sql1=mysql_query("select * from `casefile` where status ='open' AND opendate>= '" . date("y-m-01")."';") or die(mysql_error());
									$open=mysql_num_rows($sql1);
								?>
								<li>Case Opened:  <?php echo $open; ?></li>
								<?php
									$sql=mysql_query("select closedate from `casefile` 
										where status='close' and closedate>= '" . date("y-m-01")."';") or die(mysql_error());
									$close=mysql_num_rows($sql);
								?>
								<li>Cases Closed:  <?php echo $close; ?></li>
								</ul>
								</div>
							</div>
</div>
</div>

<!-- Account Reports -->
 <div class="span2" style="margin-left: 10px">
 <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Finance Reports</br>(<?php echo(date("F")); ?>)</div>
                            </div>
                            <div class="block-content collapse in"  style=" min-height: 100px">
                                <div class="span12">
								
								<?php
									$sql=mysql_query("select SUM(dues.amount) AS netAmount from `case`
										INNER JOIN `dues` on case.caseid=dues.caseid
										WHERE `case`.opendate>= '" . date("y-m-01")."';") or die(mysql_error());
									$res=mysql_fetch_array($sql);
								?>
								<form name="report_client_dues" method="GET" action="clientduesreport.php">
								<div class="control-group">
                                          <div class="controls">
										    <select  type="text" style="width: 150px;" name="clientid" required>
											<option value="">Select Client</option>
											
											<?php
											$sql=mysql_query("select fname,lname,clientid from client ");
											while($res=mysql_fetch_array($sql)){
											?>
											<option value="<?php echo $res['clientid']; ?>"><?php echo ucfirst($res['fname']) ." ".ucfirst($res['lname']); ?>
											</option>
											<?php
											}
											?>
											</select>
                                          </div>
                                        </div>
								<div class="control-group">
                                          <div class="controls">
										<button type="submit" class="btn btn-info">Show</button>
								</div>
								</div>
								</form>
								</div>
							</div>
</div>
</div>
