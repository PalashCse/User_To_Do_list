<?php 
	session_start();
    require('db_connection/db_connection.php');
    require('user_id/uid.php');
	require('task_id/taskid.php');
	require('select_database/dbselect.php');
    
	   
	    $sql = 'DELETE FROM to_do_lists WHERE task_id="'.$taskid.'"';
	    $result=mysqli_query($db, $sql);
		
		//Destination 
		if($result)
		{
		  header('Location:show_task.php?id='.$uid);
		}
		mysqli_close($db);
?>