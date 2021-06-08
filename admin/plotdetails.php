<?php  include('header_dashboard.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
         <div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
			<div class="span6">
			     <?php
				 $id=$_GET['id'];
				 $sql=mysql_query("SELECT * FROM plot
				 LEFT JOIN plottype on plot.plottype=plottype.typeid
				 where plotid='$id'") or die(mysql_error());
				 ?>
				<div class="row-fluid">
							
		                        <!-- block -->
								<?php
								if(isset($_GET['error'])){?>
								<div class="alert alert-danger" role="alert">
								<span class="icon icon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
									Case Already Opened
								</div>
							<?php	}
								?>
								<?php
								if(isset($_GET['response'])){?>
								<div class="alert alert-success" role="alert">
								<span class="icon icon-ok" aria-hidden="true"></span>
								<span class="sr-only">Done:</span>
									Case  Opened
								</div>
							<?php	}
								?>
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Plot Details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="dashboard.php"><i class="icon-arrow-left"></i> Back</a>
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
													<th></th>
													<th></th>
										   </tr>
									</thead>
									<tbody>
										<?PHP 
										$row = mysql_fetch_array($sql)
										?>
										<tr>
										<td>Plot Code<td>
										<td><?php echo $row['plotcode']; ?><td>
										</tr>
										<tr>
										<td>Plot Type<td>
										<td><?php echo ucfirst($row['typename']); ?><td>
										</tr>
										<tr>
										<td>Price<td>
										<td><?php echo $row['price']; ?><td>
										</tr>
										<tr>
										<td>Location<td>
										<td><?php echo $row['location']; ?><td>
										</tr>
										<tr>
										<td>Features<td>
										<td><?php echo $row['features']; ?><td>
										</tr>
										<tr>
										<td>Area: <td>
										<td><?php echo $row['kanal']." Kanal(s) and ".$row['marla']." Marlas"; ?><td>
										</tr>
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
		                                <div class="muted pull-left">Open Case for this plot</div>
		                            </div>
									
		                            <div class="block-content collapse in">
									<form id="opencasefrm" method="get" action="add_case.php">
									<div class="control-group">
                                          <div class="controls">
                                            <select name="clientid" class="input focused" id="focusedInput" type="text" placeholder = "Land Owner" required>
											<?php
									$sql=mysql_query("select clientid,fname,lname from client")or die(mysql_error());
									while($res=mysql_fetch_array($sql)){
											?>
											<option value="<?php echo $res['clientid']; ?>"><?php echo ucwords($res['fname'])." ".ucwords($res['lname']) ; ?></option>
											<?php }?>
											</select>
										  </div>
                                    </div>
												<input type="hidden" name="plotid" value="<?php echo $id; ?>"></input>
                                       
									<div class="control-group">
                                          <div class="controls">
												<button class="btn btn-info" type="submit"><i class="icon-plus-sign icon-large"> &nbsp;&nbsp;&nbsp;Open Case</i></button>
                                          </div>
                                        </div>
										</form>
									</div>
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