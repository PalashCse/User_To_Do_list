<?php 
	session_start();
    require('db_connection/db_connection.php');
    require('user_id/uid.php');
	require('select_database/dbselect.php');
    
	   
	    $sql = 'DELETE FROM users WHERE user_id="'.$uid.'"';
	    $result=mysqli_query($db, $sql);
		
		//Destination 
		if($result)
		{
		  header('Location:index.php');
		}
		mysqli_close($db);
?>