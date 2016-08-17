<?php
     
    /*database connection*/	 
	$dbhost = "mysql6.000webhost.com";
	$dbuser = "a5341860_just";
	$dbpass = 'palashku110243';
	$dbname="a5341860_mydb";
	

	$db = mysqli_connect($dbhost, $dbuser, $dbpass);
	if (!$db) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}


?>