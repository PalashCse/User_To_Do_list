<?php 
	session_start();
    require('db_connection/db_connection.php');
    require('user_id/uid.php');
	require('task_id/taskid.php');
	require('select_database/dbselect.php');
	//Update Tasks
    if(isset($_POST['update']))			
	{
		if(isset($_POST['ttitle'])){ $ttitle = $_POST['ttitle']; } 
		if(isset($_POST['tdes'])){ $tdes = $_POST['tdes']; } 
		if(isset($_POST['date'])){ $date = $_POST['date']; }
			
		$sql='UPDATE to_do_lists SET task_title="'.$ttitle.'", 
				                      task_description="'.$tdes.'",
									  date="'.$date.'"
									   WHERE task_id="'.$taskid.'"';
		$result=mysqli_query($db, $sql);
				
	   if($result)
		{
		  header('Location:show_task.php?id='.$uid);
		}
		
		
	}
	   
		mysqli_close($db);
?>