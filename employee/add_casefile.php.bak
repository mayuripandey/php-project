<?php


include 'dbcon.php';
include 'session.php';

$sql=mysql_query("select count(*) as num from `casefile`;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$count=$res['num'];

$code= str_pad($count, 5, "0", STR_PAD_LEFT);
$code="CF".date("Y").$code;
$proid=$_GET['plotid'];

$clientid=$_GET['cid'];
$empid=$_GET['empid'];
$query=mysql_query("INSERT INTO  `casefile` (  `plotid` ,  `casefilecode` ,  `opendate` ,  `closedate` ,  `status` ,  `clientid` ,  `employeeid` )  
				values ($proid , '$code' , '" . date("Y-m-d") . "','NULL','open', $clientid , $empid );") or die(mysql_error());
				if(mysql_error()){
				header("location: dhafiledes.php?id=$proid&error=1");
				}else{
				header("location: dhafiledes.php?id=$proid&error=0");
				}

?>