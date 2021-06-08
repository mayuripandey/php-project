<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
         <div class="row-fluid">
					<?php include('sidebar_dhaproperty.php'); ?>
                <!--/span-->
			<div class="span6">
			     <?php
				 $id=$_GET['id'];
				 $sql=mysql_query("SELECT * FROM property
				 LEFT JOIN plottype on property.propertytype=plottype.typeid
				 where propertyid='$id'") or die(mysql_error());
				 ?>
				<div class="row-fluid">
							
		                        <!-- block -->
								<?php
								if(isset($_GET['error'])){
								if($_GET['error']== 1){?>
								<div class="alert alert-danger" role="alert">
								<span class="icon icon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
									Something went wrong!!!
								</div>
							<?php	}else{
								?>
								<div class="alert alert-success" role="alert">
								<span class="icon icon-ok" aria-hidden="true"></span>
								<span class="sr-only">Done:</span>
									New Case Opened!!!
								</div>
							<?php	}}
								?>
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Plot Details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<button onclick="goBack()" class="btn btn-info"><i class="icon-arrow-left"></i>Go Back</button>
											<script>
									function goBack() {
									window.history.back()
												}
											</script>
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
										<td>Property Code<td>
										<td><?php echo $row['propertycode']; ?><td>
										</tr>
										<tr>
										<td>Property Type<td>
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
										<td>Area: <td>
										<td><?php echo $row['acre']." Acres(s)"; ?><td>
										</tr>
										</tbody>
									</table>	
									</div>
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div> 
				<?php 
				$sql=mysql_query("select count(*) as num from `case` where plotid=$id");
				$res=mysql_fetch_array($sql);
				if ( $res['num'] == 0 ) {
				?>
				
				<div class="span3">
			     <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Open Case for this property</div>
		                            </div>
									
		                            <div class="block-content collapse in">
									<form id="opencasefrm" method="get" action="add_case.php">
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
			<?php } ?>
				 
            </div>
			</div>
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>