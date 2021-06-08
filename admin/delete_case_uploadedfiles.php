<?php

include('dbcon.php');
$check=true;
if (isset($_POST['delete_files'])){
$id=$_POST['selector'];
$N = count($id);

for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM `files` where `fileid`='$id[$i]'");
	echo mysql_affected_rows();
	if(mysql_affected_rows()<=0){
	$check=false;
	}
	
}
}
$caseid=$_POST['caseid'];
header("location: casedetails.php?id=$caseid");

?>