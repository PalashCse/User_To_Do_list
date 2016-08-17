<?php 
	session_start();
    require('db_connection/db_connection.php');
    require('user_id/uid.php');
	require('task_id/taskid.php');
	require('select_database/dbselect.php');
	//Status Update
    if(isset($_POST['update']))
	{
        $selected_val = $_POST['select_status'];
		$sql='UPDATE to_do_lists SET task_status="'.$selected_val.'" 
									   WHERE task_id="'.$taskid.'"';
		$result=mysqli_query($db, $sql);
				
	   if($result)
		{
		  header('Location:show_task.php?id='.$uid);
		}
		
		
	}
	   
		mysqli_close($db);
?>