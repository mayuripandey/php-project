<?php
include('dbcon.php');
$id=$_POST['caseid'];
$image_name = addslashes($_FILES["image"]["name"]);
						        $ext = explode('.', $image_name);
								$count=count($ext)-1;
						        $newName = time().uniqid(rand(), true) . '.' . $ext[$count];
                                $image_size = $_FILES['image']['size'];
								if($ext[1]!="jpeg" && $ext[1]!="jpg" && $ext[1]!="png" && $image_size<500000){
								header("Location: casefiledetails.php?id=$id&error=1");
								}else{
								if (!file_exists('../admin/uploads/casefiles/'.$id)) {
									mkdir('../admin/uploads/casefiles/'.$id, 0777, true);
								}
								move_uploaded_file($_FILES["image"]["tmp_name"], '../admin/uploads/casefiles/'.$id ."/". $newName);
								}
		$type=$_POST['filetype'];
		
	$sql=mysql_query("insert into filefiles(`location`,`title`,`uploaddate`,`casefileid`) values('uploads/casefiles/$id/$newName','$type','".date("Y-m-d")."',$id);")or die(mysql_error());
	header("Location: casefiledetails.php?id=$id&error=0");
?>