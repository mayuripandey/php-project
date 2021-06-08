<?php  include('header_dashboard.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
         <div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
			<div class="span9">
			     <?php
				 $id=$_GET['id'];
				 $sql=mysql_query("SELECT * FROM plot
				 LEFT JOIN plottype on plot.plottype=plottype.typeid
				 where plotid='$id'") or die(mysql_error());
				 ?>
				<div class="row-fluid">
							
		                        <!-- block -->
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
				 
            </div>
			</div>
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>