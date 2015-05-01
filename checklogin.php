<?php
	include('config.php');
	ob_start();
	$tbl_name="users"; // Table name

	// Define $myusername and $mypassword
	$user=$_POST['username'];
	$pass=$_POST['password'];

	// To protect SQL injection
	$user = stripslashes($user);
	$pass = stripslashes($pass);
	$user = pg_escape_string($user);
	$pass = pg_escape_string($pass);

	$sql="SELECT * FROM $tbl_name WHERE username='$user' and password='$pass'";
	$result=pg_query($sql);

	// Mysql_num_row is counting table row
	$count=pg_num_rows($result);

	// If result matched $user and $pass, table row must be 1 row

	if($count==1){

		// Register $user, $pass and redirect to file "login_success.php"
		session_register("user");
		session_register("pass");
		header("location:login_success.php");
	}
	else {
		echo "Wrong Username or Password";
	}

	ob_end_flush();
?>