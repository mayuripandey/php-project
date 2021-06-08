<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysql_query("update client set status = 'deactive' where clientid = '$get_id'");
header('location:client.php');
?>