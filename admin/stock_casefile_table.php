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
							
                            <div class="muted pull-left">DHA File Stock Report<?php if(!isset($_GET['print'])) { ?><a href="<?php echo $printurl; ?>" target="_BLANK"> Print</a><?php } ?></div>
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
<tr>
<?php 
$a=0;
$bb=0;
if(isset($_GET['startdate']) && isset($_GET['enddate'])){
$sql=mysql_query("select * from `plotstockbalancedetails` s,plot p  where p.plotid=s.plotid and stockdate<'".$_GET['startdate']."'");
while($res=mysql_fetch_array($sql)){
if($res['particular']=="in"){
$a=$a+((double) $res['kanal']);
$bb=$bb+((double) $res['marla']);
}
if($res['particular']=="out"){
$a=$a-((double) $res['kanal']);
$bb=$bb-((double) $res['marla']);
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
								<td><?php echo $a." Kanals ".$bb." Marlas"; ?></td>
								</tr>								
								<?php
								$query="SELECT * from `plotstockbalancedetails` 
								INNER JOIN `plot` ON `plot`.plotid=`plotstockbalancedetails`.plotid
								LEFT JOIN `casefile` ON `plot`.plotid=`casefile`.plotid
								order by stockdate;";
								if(isset($_GET['startdate']) && isset($_GET['enddate'])){
									$query="SELECT * from `plotstockbalancedetails` 
								INNER JOIN `plot` ON `plot`.plotid=`plotstockbalancedetails`.plotid
								LEFT JOIN `casefile` ON `plot`.plotid=`casefile`.plotid
								where stockdate BETWEEN '".$_GET['startdate']."' AND
								'".$_GET['enddate']."'
								order by stockdate;";
									} 
								$sql=mysql_query($query) or die(mysql_error());
								$in=0;//Total In Kanal
								$out=0;//Total Out Kanal
								$inm=0;// Total in marla
								$outm=0; //Total in Marla
								$b=$a;//Kanal balance
								$m=$bb;//Marla balance
								while($res=mysql_fetch_array($sql)){ ?>
						<tr>
								<td><?php echo $res['stockdate']; ?></td>
								<td><?php echo $res['plotcode']; ?></td>
								<?php
								if(is_null($res['casefilecode'])){
								?>
								<td>Case Not opened</td>
								<?php
								}else{
								?>
								<td><?php echo $res['casefilecode']; ?></td>
								<?php
								}
								if($res['particular']=='in'){
								?>
								<td>Property Added</td>
								<td><?php  echo $res['kanal']." Kanals ".$res['marla']." Marlas"; 
								$b=$b+((double)$res['kanal']);
								$m=$m+((double)$res['marla']);
								$in=$in+((double)$res['kanal']);
								$inm=$inm+((double)$res['marla']);
								?></td>
								
								<td></td>
								<?php 
								}
								if($res['particular']=='out'){
								?>
								<td>Property Case Closed</td>
								<td></td>
								<td><?php  echo $res['kanal']." Kanals ".$res['marla']." Marlas"; 
								$b=$b-((double)$res['kanal']);
								$m=$m-((double)$res['marla']);
								$out=$out+((double)$res['kanal']);
								$outm=$outm+((double)$res['marla']);
								
								?></td>
								<?php } ?>
								<td><?php echo $b." Kanals ".$m." Marlas"; ?></td>
								</tr>
								<?php }
								?>
								
								<tr>
								<td></td>
								<td></td>
								<td></td>
								<td style="font-weight: bold">TOTAL</td>
								<td style="font-weight: bold"><?php echo $in." Kanals ".$inm." Marlas"; ?></td>
								<td style="font-weight: bold"><?php echo $out." Kanals ".$outm." Marlas"; ?></td>
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