<?php
		include('dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysql_query("SELECT user.userid,clientcode,clientid FROM user 
							LEFT JOIN client ON client.userid=user.userid
							WHERE UserName='$username' AND password='$password'")or die(mysql_error());
		$count = mysql_num_rows($query);
		$row = mysql_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['userid'];
		$_SESSION['clientid']=$row['clientid'];
		$_SESSION['code']=$row['clientcode'];
		
		echo 'true';
		
		mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['userid'].")")or die(mysql_error());
		 }else{ 
		echo 'false';
		}	
				
		?>