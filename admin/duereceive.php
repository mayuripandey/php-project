<?php 
include 'dbcon.php';
$id=$_GET['id'];
$caseid=$_GET['cid'];
$query=mysql_query("select status from dues where duesid=$id");
$res=mysql_fetch_array($query);
$stat="";
if($res['status']=="recieved"){
$stat="notrecieved";
} else {
$stat="recieved";
}

$query=mysql_query("update dues set status='$stat' where duesid=$id");
header("location: casedetails.php?id=$caseid");
 ?>