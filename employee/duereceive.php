<?php 
include 'dbcon.php';
$id=$_GET['id'];
$caseid=$_GET['cid'];
$query=mysql_query("update dues set status='recieved' where duesid=$id");
header("location: casedetails.php?id=$caseid");
 ?>