<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysql_query("update employee set status = 'active' where empid = '$get_id'");
header('location:employ.php');
?>