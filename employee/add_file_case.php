				<div class="span12">
					<div class="row-fluid">		
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">File Upload</div>
		                            </div>
		                            <div class="block-content collapse in">
									
									<form  method="POST" action="casefileupload.php" enctype="multipart/form-data">
									<p>File Type:</p>
									<div class="control-group">
                                          <div class="controls">
                                            <select name="filetype" class="input focused" id="focusedInput" type="text" placeholder = "Land Owner" required>
											<?php 
											$query=mysql_query("select * from filetype") or die(mysql_error()); 
											while($res=mysql_fetch_array($query)){
											?>
											<option value="<?php echo $res['typeid']; ?>"><?php echo ucwords($res['typename']); ?></option>
											<?php }?>
										  </div>
                                    </div>
									<input name="caseid" type="hidden" value="<?php echo $_GET['id']; ?>">
									<p>Select File:</p>
									<div class="control-group">
											<div class="controls">
											
											<input name="image" class="input-file uniform_on"  type="file" required>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
											<button name="addproperty" class="btn btn-info" type="submit"><i class="icon-plus-sign icon-large"> &nbsp;&nbsp;&nbsp;Add File</i></button>
											</div>
										</div>
									</form>
									</div>
								</div>
								
					</div>				 
				</div>