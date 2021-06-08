<div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Add Plots</div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
									<form   method="post" enctype="multipart/form-data">
										<div class="control-group">
                                          <div class="controls">
                                            <select name="plottype" class="input focused" id="focusedInput" type="text" required>
											<option value="">Select Plot Type</option>
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
                                            <input name="owner" class="input focused" id="focusedInput" type="text" placeholder = "Land Owner" required>
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
                                            <TextArea name="features" class="input focused" id="focusedInput" type="text" placeholder = "Features" ></TextArea>
											
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
                                            <input name="kanal" class="input focused" id="focusedInput" type="text" placeholder = "Total Kanals" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="marla" class="input focused" id="focusedInput" type="text" placeholder = "Total Marlas" required>
                                          </div>
                                        </div>
										<div class="control-group">
											<div class="controls">
											Select Image:
											<input name="image" id="image" class="input-file uniform_on"  type="file" required multiple="true"
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
<?php

/// Nothing is implemented
/// TODO: plotcode, multiple file uploading, file size checking and quries.....
///

if(isset($_POST['addproperty'])){
		
$sql=mysql_query("select count(*) as num from plot;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$count=$res['num'];

$code= str_pad($count, 5, "0", STR_PAD_LEFT);
$code="PLOT".date("Y").$code;

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
$sql=mysql_query("INSERT INTO `plot`(`plotcode`, `plottype`, `owner`, `location`, `entrydate`, `price`, 
				`views`, `features`, `picture`, `status`, `mouza`, `Kewat`, `khatooni`, `khasra`, `kanal`, `marla`)
		VALUES ('$code','".$_POST['plottype']."','".$_POST['owner']."','".$_POST['location']."','".date("y-m-d")."','".$_POST['price']."',0,'".$_POST['features']."','".'uploads/plots/' . $newName."',
		'unsold','".$_POST['mouza']."','".$_POST['khewat']."','".$_POST['khatooni']."','".$_POST['khasra']."','".$_POST['kanal']."','".$_POST['marla']."');") or die(mysql_error());
}
?>