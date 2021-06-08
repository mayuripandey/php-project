 <div class="span9" id="content">
 <div class="row-fluid">
<div class="block">
	<div class="navbar navbar-inner block-header">
		<div id="" class="muted pull-right">
		<?php $query = mysql_query("select `case`.caseid,casecode,plot.plotid,plotcode,marla,kanal,`plot`.picture,price
				FROM plot
				LEFT JOIN `case` on `plot`.plotid=`case`.plotid
				Left Join client on `case`.clientid=`client`.clientid
				where `client`.userid=".$_SESSION['id'])or die(mysql_error());
		$count = mysql_num_rows($query);
		?>
		<span class="badge badge-info"><?php echo $count; ?></span>
		</div>
	</div>
    
	<div class="block-content collapse in">
		<div class="span12">
								
  			<ul	 id="da-thumbs" class="da-thumbs">
				<?php
				if ($count != '0'){
				while($row = mysql_fetch_array($query)){
				$id = $row['caseid'];	
				?>
					<li style="display: inline; list-style-type: none; ">
						<a href="casedetails.php<?php echo '?id='.$id; ?>">
						<img src ="../admin/<?php echo $row['picture'] ?>" width="160px" height="50px" class="img-polaroid">
						<div>
							<span>
								<p>Plot Code:</p>
								<p><?php echo $row['plotcode']; ?></p>
								<p><?php echo "Price: " . number_format($row['price'],0); ?></p>
								<p>Area:</p>
								<p><?php echo $row['kanal']." Kanals "; ?></p>
								<p> <?php echo $row['marla']." Marlas";?></p>
							</span>
						</div>
						</a>				
					</li>
								
			
									<?php }}else{ ?>
									<div class="alert alert-info">
									<i class="icon-info-sign"></i> You have not opened any case.
									</div>
									<?php } ?>	
			</ul>
						
                                </div>
                            </div>
                        </div>
						</div>
						</div>