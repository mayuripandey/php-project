<?php

if(isset($_POST['addproperty'])){
$check=1;		
$sql=mysql_query("select count(*) as num from property;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$count=$res['num'];

$code= str_pad($count, 5, "0", STR_PAD_LEFT);
$code="DHAPLOT".date("Y").$code;
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

$sql=mysql_query("INSERT INTO `property`(`propertycode`, `propertytype`, `clientid`, `location`, `entrydate`, `price`, 
				`status`, `mouza`, `kewat`, `khatooni`, `khasra`, `acre`)
		VALUES ('$code','".$_POST['plottype']."','".$_POST['clientid']."','".$_POST['location']."','".date("y-m-d")."','".$_POST['price']."',
		'unsold','".$_POST['mouza']."','".$_POST['khewat']."','".$_POST['khatooni']."','".$_POST['khasra']."','".$_POST['kanal']."');") or die(mysql_error());
		if(mysql_error()){
		$check=0;
		}
}else{
$check=0;		
}
		
		}
?>


<div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">
							<?php
							if(isset($check)){
							if($check==1){
							?>
							<div class="alert alert-info" role="alert">Property Added!!</div>
							<?php
							}else{
							?>
							<div class="alert alert-info" role="alert">Something Went Wrong!!</div>
							<?php
							}}
							?>
							Add Property</div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
									<form   method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <select name="plottype" class="input focused" id="focusedInput" type="text" required>
											<option value="">Select Property Type</option>
											<?php
											$sql=mysql_query("select * from plottype ;")or die(mysql_error());
											while($row=mysql_fetch_array($sql)){
											?>
											<option value="<?php echo $row['typeid']; ?>"><?php echo $row['typename']; ?></option>
											<?php
											}
											?>
											</select>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <select name="clientid" class="input focused" id="focusedInput" type="text" required>
											<option value="">Select Client</option>
											<?php
											$sql=mysql_query("select clientid,fname,lname from client;")or die(mysql_error());
											while($row=mysql_fetch_array($sql)){
											?>
											<option value="<?php echo $row['clientid']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
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
                                            <input name="mouza" class="input focused" id="focusedInput" type="text" placeholder = "Mouze" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="khewat" class="input focused" id="focusedInput" type="text" placeholder = "Khewat Number" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="khatooni" class="input focused" id="focusedInput" type="text" placeholder = "Khatooni Number" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="khasra" class="input focused" id="focusedInput" type="text" placeholder = "Khasra Number" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="kanal" class="input focused" id="focusedInput" type="text" placeholder = "Total Acres" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
												<button name="addproperty" class="btn btn-info" type="submit"><i class="icon-plus-sign icon-large"> &nbsp;&nbsp;&nbsp;Add Property</i></button>
                                          </div>
                                        </div>
										
									</form>
								</div>
							</div>
							</div>
							</div>
