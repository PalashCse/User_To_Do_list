<?php 
	//Database Selected
	$db_selected = mysqli_select_db($db,'my_database');
	if (!$db_selected) 
	{
		die('Can\'t use ' . $dbname . ': ' . mysql_error());
    }
	?>