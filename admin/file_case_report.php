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
							
                            <div class="muted pull-left">DHA File Case Report<?php if(!isset($_GET['print'])) { ?><a href="<?php echo $printurl; ?>" target="_BLANK"> Print</a><?php } ?></div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
								<?php if(isset($_GET['delerr'])){
								echo $_GET['delerr'];} ?>
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
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
                                    <th>Property Code</th>
									<th>Case Code</th>
									<th>Case Status </th>
                                </tr>
										</thead>
								<tbody>		
								
								<?php
								$query="select `plot`.plotid,plotcode,casefilecode,`casefile`.status,casefileid from `casefile`
								INNER JOIN plot ON `casefile`.plotid=`plot`.plotid;
								";
								if(isset($_GET['startdate']) && isset($_GET['enddate'])){
									$query="select plotcode,casefilecode,`casefile`.status from `casefile`
								INNER JOIN plot ON `casefile`.plotid=`plot`.plotid
								where opendate BETWEEN '".$_GET['startdate']."' AND
								'".$_GET['enddate']."'
								order by opendate;";
									} 
								$sql=mysql_query($query) or die(mysql_error());
								$in=0;
								$out=0;
								$b=0;
								while($res=mysql_fetch_array($sql)){ ?>
								<tr>
								<td><a href="dhafiledes.php?id=<?php echo$res['plotid']; ?>"><?php echo $res['plotcode']; ?></a></td>
								<?php
								if(is_null($res['casefilecode'])){
								?>
								<td>Case Not opened</td>
								<?php
								}else{
								?>
								<td><a href="casefiledetails.php?id=<?php echo$res['casefileid']; ?>"><?php echo $res['casefilecode']; ?></td>
								<?php
								}?>
								<td><?php echo $res['status']; ?></td>
								</tr>
								<?php }
								?>
								
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