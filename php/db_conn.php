<?php
	$host = "database2.cs.tamu.edu";
	$username = "jiangbing";
	$password = "19891126jb";
	$dbname = "jiangbing-P1_image_gallary";
	$mysql = mysql_connect($host, $username, $password); 
	if(!$mysql)
	{
		die("Cannot connect: ".mysql_error());
	}
	mysql_select_db($dbname,$mysql);
?>
			