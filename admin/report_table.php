<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php if(!isset($_GET['print'])) { include('navbar.php'); } ?>
        <div class="container-fluid">
            <div class="row-fluid">
			
					<?php if(!isset($_GET['print'])) {
					include('sidebar_report.php');
					}else{ ?>
					<script>
					window.print();
					</script>
					<?php } ?>
<div class="span9" style="margin-left: 0px">
<!--- Block -->		
<div id="block_bg" class="block" style="margin-top: 30px;">
                            <div class="navbar navbar-inner block-header">
<?php	

$printurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$query = parse_url($printurl, PHP_URL_QUERY);
// Returns a string if the URL has parameters or NULL if not
if ($query) {
    $printurl .= '&print=1';
} else {
    $printurl .= '?print=1';
}
?>
							
                            <div class="muted pull-left">DHA Property Report<?php if(!isset($_GET['print'])) { ?><a href="<?php echo $printurl; ?>" target="_BLANK"> Print</a><?php } ?></div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
								<?php if(isset($_GET['delerr'])){
								echo $_GET['delerr'];} ?>
									<table cellpadding="0" cellspacing="0" border="0" class="table">
									<?php if(!isset($_GET['print'])) { ?>
									<button onclick="goBack()" class="btn btn-info"><i class="icon-arrow-left"></i>Go Back</button>
											<script>
									function goBack() {
									window.history.back()
												}
											</script>
					<form>
					                   <p>Date from<input class="datepicker" data-date-format="yyyy-mm-dd" value="<?php if(isset($_GET['startdate'])){ echo $_GET['startdate'];  } ?>" name="startdate" id="startdatepicker" required>Date to<input name="enddate" class="datepicker" id="enddatepicker" data-date-format="yyyy-mm-dd" value="<?php if(isset($_GET['enddate'])){ echo $_GET['enddate'];  } ?>" required></p>
					                  <div class="control-group">
                                          <div class="controls">
												<button class="btn btn-info" type="submit"><i class="icon-search icon-large"> &nbsp;&nbsp;&nbsp;Search</i></button>
                                          </div>
                                        </div>
						</form><?php } ?>
					<thead>
								<tr>
                                    <th>Date</th>
									<th>Property</th>
									<th>Case# </th>
									<th>Particulars </th>
                                    <th>Stock in</th>
									<th>Stock out</th>
									<th>Balance</th>
                                </tr>
										</thead>
								<tbody>		
<tr>             <?php 
$a=0;
if(isset($_GET['startdate']) && isset($_GET['enddate'])){
$sql=mysql_query("select * from `stockbalancedetails` s,property p  where p.propertyid=s.propertyid and stockdate<'".$_GET['startdate']."'");
while($res=mysql_fetch_array($sql)){
if($res['particular']=="in"){
$a=$a+((double) $res['acre']);
}
if($res['particular']=="out"){
$a=$a-((double) $res['acre']);
}

}
}
 ?>
								<td></td>
								<td></td>
								<td></td>
								<td>Opening Balance</td>
								<td></td>
								<td></td>
								<td><?php echo $a; ?></td>
								</tr>								
								<?php
								$query="SELECT * from `stockbalancedetails` 
								INNER JOIN `property` ON `property`.propertyid=`stockbalancedetails`.propertyid
								LEFT JOIN `case` ON `property`.propertyid=`case`.plotid
								order by stockdate;";
								if(isset($_GET['startdate']) && isset($_GET['enddate'])){
									$query="SELECT * from `stockbalancedetails` 
								INNER JOIN `property` ON `property`.propertyid=`stockbalancedetails`.propertyid
								LEFT JOIN `case` ON `property`.propertyid=`case`.plotid
								where stockdate BETWEEN '".$_GET['startdate']."' AND
								'".$_GET['enddate']."'
								order by stockdate;";
									} 
								$sql=mysql_query($query) or die(mysql_error());
								$in=0;
								$out=0;
								$b=$a;
								while($res=mysql_fetch_array($sql)){ ?>
								<tr>
								<td><?php echo $res['stockdate']; ?></td>
								<td><?php echo $res['propertycode']; ?></td>
								<?php
								if(is_null($res['casecode'])){
								?>
								<td>Case Not opened</td>
								<?php
								}else{
								?>
								<td><?php echo $res['casecode']; ?></td>
								<?php
								}if($res['particular']=='in'){
								?>
								<td>Property Added</td>
								<td><?php  echo $res['acre']; $b=$b+((double)$res['acre']); $in=$in+((double)$res['acre']); ?></td>
								<td></td>
								<?php 
								}
								if($res['particular']=='out'){
								?>
								<td>Property Case Closed</td>
								<td></td>
								<td><?php  echo $res['acre']; $b=$b-((double)$res['acre']); $out=$out+((double)$res['acre']);} ?></td>
								<td><?php echo $b; ?></td>
								</tr>
								<?php }
								?>
								
								<tr>
								<td></td>
								<td></td>
								<td></td>
								<td style="font-weight: bold">TOTAL</td>
								<td style="font-weight: bold"><?php echo $in; ?></td>
								<td style="font-weight: bold"><?php echo $out; ?></td>
								<td></td>
								</tr>
							  
							    </tbody>
									</table>
								</div>
							</div>
							</div>
<!-- Block END-->
						</div>				
				
			</div>
    
         <?php if(!isset($_GET['print'])) { include('footer.php'); }?>
        </div>
	<?php include('script.php'); ?>
	<?php include ('user_validation_script.php'); ?>
    </body>

</html>