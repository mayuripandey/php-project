<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysql_query("update employee set status = 'deactive' where empid = '$get_id'");
header('location:employ.php');
?>