<?php


include 'dbcon.php';
include 'session.php';

$sql=mysql_query("select count(*) as num from `case`;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$count=$res['num'];

$code= str_pad($count, 5, "0", STR_PAD_LEFT);
$code="C".date("Y").$code;
$proid=$_GET['plotid'];

$sql=mysql_query("select clientid from `property` where propertyid=$proid;") or die(mysql_error());;
$res=mysql_fetch_array($sql);
$clientid=$res['clientid'];
$query=mysql_query("INSERT INTO  `case` (  `plotid` ,  `casecode` ,  `opendate` ,  `closedate` ,  `status` ,  `clientid` ,  `employeeid` )  
				values ($proid , '$code' , '" . date("Y-m-d") . "','NULL','open', $clientid , $emp_id );");
				if(mysql_error()){
				header("location: dhapropertydes.php?id=$proid&error=1");
				}else{
				header("location: dhapropertydes.php?id=$proid&error=0");
				}

?>