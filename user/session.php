<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php
}else{
$sql=mysql_query("select count(*) as num from client where userid=".$_SESSION['id']." AND clientid='".$_SESSION['clientid']."';");
$res=mysql_fetch_array($sql);
if($res['num']==0){
?>
<script>
window.location = "index.php";
</script>
<?php } 
}
$session_id=$_SESSION['id'];

$user_query = mysql_query("select * from user where userid = '$session_id'")or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$user_username = $user_row['UserName'];
?>
