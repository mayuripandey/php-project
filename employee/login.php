<?php
		include('dbcon.php');
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysql_query("SELECT user.userid,empcode,empid FROM user 
							LEFT JOIN employee ON employee.userid=user.userid
							WHERE UserName='$username' AND password='$password'")or die(mysql_error());
		$count = mysql_num_rows($query);
		$row = mysql_fetch_array($query);


		if ($count > 0){
		session_start();
		$_SESSION['id']=$row['userid'];
		$_SESSION['code']=$row['empcode'];
		$_SESSION['empid']=$row['empid'];
		
		echo 'true';
		
		mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['userid'].")")or die(mysql_error());
		 }else{ 
		echo 'false';
		}	
				
		?>