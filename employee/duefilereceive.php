<?php 
include 'dbcon.php';
$id=$_GET['id'];
$caseid=$_GET['cid'];
$query=mysql_query("update filedues set status='received' where dueid=$id");
if(mysql_error()!=""){
header("location: casefiledetails.php?id=$caseid&errordues=1");
 }else{
header("location: casefiledetails.php?id=$caseid&errordues=0");
 
 }
 ?>