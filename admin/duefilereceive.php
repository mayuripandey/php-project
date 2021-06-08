<?php 
include 'dbcon.php';
$id=$_GET['id'];
$caseid=$_GET['cid'];
$query=mysql_query("select status from filedues where dueid=$id");
$res=mysql_fetch_array($query);
$stat="";
if($res['status']=="received"){
$stat="notreceived";
}else{
$stat="received";
}
$query=mysql_query("update filedues set status='$stat' where dueid=$id");
if(mysql_error()!=""){
header("location: casefiledetails.php?id=$caseid&errordues=1");
 }else{
header("location: casefiledetails.php?id=$caseid&errordues=0");
 
 }
 ?>