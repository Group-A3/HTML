<?php
	$host="webcourse.cs.nuim.ie";
	$username="cs230teama3";
	$password="ooKohlee";
	$dbname="cs230";
	
	$dbconn = pg_connect("host=$host dbname=$dbname user=$username password=$password")
		or die('Could not connect to database: ' . pg_last_error());
?>