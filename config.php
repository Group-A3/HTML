<?php
	$host="webcourse.cs.nuim.ie";
	$username="cs230teama3";
	$password="ooKohlee";
	$dbname="cs230";
	define("SECURE", FALSE);
	
	$dbconn = pg_connect("$host","$dbname","$username","$password");
	or die('Could not connect to database: ' . pg_last_error());
?>