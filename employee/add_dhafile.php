<?php

if(isset($_POST['addplot'])){
$check=1;		
$sql=mysql_query("select count(*) as num from plot;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$count=$res['num'];

$code= str_pad($count, 5, "0", STR_PAD_LEFT);
$code="FILE".date("Y").$code;
if(is_numeric($_POST['price']) && is_numeric($_POST['kanal'])){



/*
//File Handling
                                $image_name = addslashes($_FILES['image']['name']);
						        $ext = explode('.', $image_name);
						        $newName = time().uniqid(rand(), true) . '.' . $ext[1];
                                $image_size = $_FILES['image']['size'];
								if($ext[1]!="jpeg" && $ext[1]!="jpg" && $ext[1]!="png" && $image_size<500000){
								}else{
								move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/plots/' . $newName);
								}
//File Handling END--
*/

$sql=mysql_query("INSERT INTO `plot`(`plotcode`, `plottype`, `caseid`, `location`, `entrydate`, `price`, 
				`status`, `kanal`, `marla`)
		VALUES ('$code','".$_POST['plottype']."','".$_POST['caseid']."','".$_POST['location']."','".date("y-m-d")."','".$_POST['price']."',
		'unsold','".$_POST['kanal']."','".$_POST['marla']."');") or die(mysql_error());
		if(mysql_error()){
		$check=0;
		}
}else{
$check=0;		
}
		header("refresh: 3;");
		
		}
?>


<div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">
							<?php
							if(isset($check)){
							if($check==1){
							?>
							<div class="alert alert-info" role="alert"><span class="icon icon-info"></span
							
							
							
							
							
							
							
							
							
							>DHA File Added!!</div>
							<?php
							}else{
							?>
							<div class="alert alert-info" role="alert">Something Went Wrong!!</div>
							<?php
							}}
							?>
							Add DHA File</div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
									<form   method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <select name="plottype" class="input focused" id="focusedInput" type="text" required>
											<option value="">Select DHA File Type</option>
											<?php
											$sql=mysql_query("select * from plottype ;")or die(mysql_error());
											while($row=mysql_fetch_array($sql)){
											?>
											<option value="<?php echo $row['typeid']; ?>"><?php echo ucwords($row['typename']); ?></option>
											<?php
											}
											?>
											</select>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <select name="caseid" class="input focused" id="focusedInput" type="text" required>
											<option value="">Select Case</option>
											<?php
											$sql=mysql_query("select casecode,caseid from `case` where status='close';")or die(mysql_error());
											while($row=mysql_fetch_array($sql)){
											?>
											<option value="<?php echo $row['caseid']; ?>"><?php echo $row['casecode']; ?></option>
											<?php
											}
											?>
											</select>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="location" class="input focused" id="focusedInput" type="text" placeholder = "location" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="price" class="input focused" id="focusedInput" type="text" placeholder = "Price" required>
                            
							</div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <TextArea name="features" class="input focused" id="focusedInput" type="text" placeholder = "Features" required></TextArea>
                                          </div>
                                        </div>
										
										
										<div class="control-group">
                                          <div class="controls">
                                            <input name="kanal" class="input focused" id="focusedInput" type="text" placeholder = "Kanals" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="marla" class="input focused" id="focusedInput" type="text" placeholder = "Marlas" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button name="addplot" class="btn btn-info" type="submit"><i class="icon-plus-sign icon-large"> &nbsp;&nbsp;&nbsp;Add DHA File</i></button>
                                          </div>
                                        </div>
										
									</form>
								</div>
							</div>
							</div>
							</div>
