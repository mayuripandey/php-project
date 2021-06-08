<?php 
if(isset($_POST['c_fname'])){
$user=$_POST['username'];
$check=0;
$sql=mysql_query("select count(*) as num from user where UserName='$user';") or die();
$result=mysql_fetch_array($sql);
if($result['num']<1){
$check=1;
$userid=mysql_insert_id();

$sql=mysql_query("select count(*) as num from employee;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$count=$res['num'];
$code= str_pad($count, 5, "0", STR_PAD_LEFT);
$code="EMP".date("Y").$code;

//File Handling
                                $image_name = addslashes($_FILES['image']['name']);
						        $ext = explode('.', $image_name);
						        $newName = time().uniqid(rand(), true) . '.' . $ext[1];
                                $image_size = $_FILES['image']['size'];
								if($ext[1]!="jpeg" && $ext[1]!="jpg" && $ext[1]!="png" && $image_size<500000){
								}else{
								move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/' . $newName);
								}
//File Handling END--
$pass=$_POST['pwd1'];
$sql=mysql_query("insert into user(`UserName`,`password`) values('$user','$pass');") or die(mysql_error());
$userid=mysql_insert_id();
$sql=mysql_query("INSERT INTO `employee`
					(`userid`,`empcode`, `fname`, `lname`, `mobile`, `landline`, `address`, `city`, `picture`,`status`) 
					VALUES 
					('$userid','$code','".$_POST['c_fname']."','".$_POST['c_lname']."','".$_POST['c_mobile']."','".$_POST['c_landline']."','".$_POST['c_address']."','".$_POST['c_city']."','uploads/" . $newName."','active')") or die(mysql_error());	

					}else{
					header('location:employ.php?erruser=userexist');
					}
					}

?>

<!--- Block -->
<div id="block_bg" class="block" style="margin-top: 30px;">
							<?php 
							if(isset($check)){
							if($check==1){?>
							<div class="alert alert-success" role="alert">Employee Added</div>
							<?php }else{ ?>
							<div class="alert alert-danger" role="alert">Username Already Exist</div>
							<?php }} ?>
                            
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Add Employee</div>
                            </div>
                            <div class="block-content collapse in" >
                                <div class="span12">
									<form  method="post" enctype="multipart/form-data" onsubmit="return checkForm(this);">
									<?php if(isset($_GET['erruser'])){
									echo 'Username Already Exixt.. pleeasae choose another';
									}
									
									?>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="c_fname" class="input focused" id="focusedInput" type="text" placeholder = "First Name" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="c_lname" class="input focused" id="focusedInput" type="text" placeholder = "Last Name" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="username" class="input focused" id="focusedInput" type="text" placeholder = "User Name" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="pwd1" class="input focused" id="focusedInput" type="password" placeholder = "Password" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="pwd2" class="input focused" id="focusedInput" type="password" placeholder = "Confirm Password" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="c_address" class="input focused" id="focusedInput" type="text" placeholder = "Address" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="c_city" class="input focused" id="focusedInput" type="text" placeholder = "City" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="c_mobile" class="input focused" id="focusedInput" type="text" placeholder = "Mobile" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="c_landline" class="input focused" id="focusedInput" type="text" placeholder = "LandLine" required>
                                          </div>
                                        </div>
										<div class="control-group">
											<div class="controls">
											<input name="image" id="image" class="input-file uniform_on"  type="file" required>
											</div>
										</div>
										<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info" type="submit"><i class="icon-plus-sign icon-large"> &nbsp;&nbsp;&nbsp;Add Employee</i></button>
                                          </div>
                                        </div>
										
									</form>
								</div>
							</div>
							</div>
<!-- Block END-->