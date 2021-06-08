<?php
include 'dbcon.php';
$caseid=$_GET['caseid'];
$type=$_GET['typeid'];
$amt=$_GET['amount'];
if(!is_numeric($amt)){
header("location: casedetails.php?id=$caseid&errordues=1");
}
$query=mysql_query("select clientid from `case` where caseid=$caseid;") or die(mysql_error());
$res=mysql_fetch_array($query);
$clientid=$res['clientid'];
$query=mysql_query("insert into `dues`(`duestype`,`clientid`,`caseid`,`amount`) values($type,$clientid,$caseid,$amt);") or die(mysql_error());
header("location: casedetails.php?id=$caseid&errordues=0");

?>