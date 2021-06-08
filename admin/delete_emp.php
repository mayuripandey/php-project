<?php

include('dbcon.php');
$check=true;
if (isset($_POST['delete_client'])){
$id=$_POST['selector'];
$N = count($id);

for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM client where clientid='$id[$i]'");
	echo mysql_affected_rows();
	if(mysql_affected_rows()<=0){
	$check=false;
	}
	
}
}
if($check){
header("location: client.php");
}else{
header("location: client.php?delerr=Cannot delete some Client(s) because he/she was affilated with on or more case files");
}
?>