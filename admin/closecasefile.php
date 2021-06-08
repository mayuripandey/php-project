			<?php
include 'dbcon.php';
if(isset($_GET['id'])){
$id=$_GET['id'];
mysql_query("update `casefile` set status='close',closedate='".date("Y-m-d")."' where casefileid=$id;")  or die(mysql_error());
$query=mysql_query("update plot set status='sold' where plotid in (select plotid from `casefile` where casefileid=$id);")  or die(mysql_error());

header("location: casefiledetails.php?id=$id");
}
?>
				