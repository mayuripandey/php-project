<?php
include 'dbcon.php';
?>
<div class="row-fluid">
					<?php 
					$sql1=mysql_query('select * from plottype')or die(mysql_error());
					while($res=mysql_fetch_array($sql1)){
					?>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><?php echo ucfirst($res['typename']) ?> Stats of <?php echo date("F"); ?></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<!-- Plot Sold-->
								<?php 
								$sql=mysql_query("select * from plot where status='sold' and plottype=".$res['typeid'].";") or die(mysql_error());
								$count=mysql_num_rows($sql);
								$sql=mysql_query("select * from plot where entrydate>='".date("y-m-01")."' and plottype=".$res['typeid'].";") or die(mysql_error());
								$total=mysql_num_rows($sql);
								if($total==0){ $total=1;}
								$percent=($count/$total)*100;
								?>
  									<div class="span3">
                                    <div class="chart" data-percent="<?php echo $percent; ?>"><?php echo $count; ?></div>
                                    <div class="chart-bottom-heading"><strong>Plot Sold</strong>
                                    </div>
                                </div>
                                <!-- Plot Sold END-->
								<!-- Cases opened-->
								<?php 
								$sql=mysql_query("SELECT COUNT( * ) AS ROWS 
                                                  FROM  `case` 
                                                  LEFT JOIN plot ON case.plotid = plot.plotid
                                                  WHERE case.status =  'open' AND plot.plottype=".$res['typeid']."
                                                  AND case.opendate >= '" . date("Y-m-01") . "'") or die(mysql_error());
								$result=mysql_fetch_array($sql);
								$count=$result['ROWS'];
								$sql=mysql_query("SELECT COUNT( * ) AS ROWS 
                                                  FROM  `case` 
                                                  LEFT JOIN plot ON case.plotid = plot.plotid
                                                  WHERE case.opendate >= '" . date("Y-m-01") . "' 
												  AND plot.plottype=".$res['typeid']."") or die(mysql_error());
								$result=mysql_fetch_array($sql);
								if($result['ROWS']==0){ $total=1;}
								else{ $total=$result['ROWS'];}
								$percent=($count/$total)*100;
								
								?>
  									<div class="span3">
                                    <div class="chart" data-percent="<?php echo $percent; ?>"><?php echo $count; ?></div>
                                    <div class="chart-bottom-heading"><strong>Case(s) Open</strong>
                                    </div>
                                </div>
                                <!-- Case opened End-->
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						<?php } ?>
                    </div>