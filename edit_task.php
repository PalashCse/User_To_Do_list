<?php 
	session_start();
    require('db_connection/db_connection.php');
	require('user_id/uid.php');
	require('task_id/taskid.php');
	require('select_database/dbselect.php');
	//Data Retrieve From Database
    $result['ttitle']=$result['tdes']=$result['date']= "";
	
	$sql = 'SELECT task_title,task_description,date FROM to_do_lists where task_id="'.$taskid.'"';
	$retval =mysqli_query($db,$sql);
	if(! $retval ) 
	{
		die('Could not get data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($retval)) 
	{
				   
		$result['ttitle']=$row['task_title'];
		$result['tdes']=$row['task_description'];
		$result['date']=$row['date'];
				   
	}
	 mysqli_close($db);		
	


?>
<?php require('header/profile_header.html');?> 
				            <a class = "navbar-brand" href = "#"> Profile </a>
			            </div>
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="log-form"><a href="Log_in.php?action=logout" ><span class="glyphicon glyphicon-log-out licon"></span>Log Out</a></li>
							</ul>
						</div>
		           </div>
	
	            </nav>
			    
			</section>
			<!--Start Middle Body-->
			<section>
			    <div class="row row-style">
				    <!--Start Side Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="home.php" class="home-style" >Home</a></li>
							<li class="update"><a href="profile_page.php" class="update-style" >Update</a></li>
							<li class="delete"><a href="delete-page.php" class="delete-style" >Delete</a></li>
							<li class="create_tdlist"><a href="create_tdl.php?id=<?php echo $uid;?>" class="create_tdlist-style" >Create ToDo List</a></li>
							<li class="edit_tdlist"><a href="edit_todo.php?id=<?php echo $uid;?>" class="edit_tdlist-style" >Edit ToDo List</a></li>
							
						</ul>
					</div>
					<!--End Side Menu-->
					<div class="col-md-7 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Welcome User</div>
							   <div class="panel-body panel-body-style">
							       <!--Start Form-->
								   <form action="task_update.php?id=<?php echo $uid;?>&tid=<?php echo $taskid;?>" class="form-horizontal" role="form" method="POST">
								   
                                        <div class="form-group">
                                           <label class="control-label col-md-3" for="ttitle">Task Title:</label>
                                           <div class="col-md-5">
                                               <input type="ttitle" class="form-control" name="ttitle" placeholder="Task Title" value="<?php echo "".$result['ttitle']."" ?>">
											</div>
										</div>
										
                                        <div class="form-group">
										    <label class="control-label col-md-3" for="tdes">Task Description:</label>
											<div class="col-md-5"> 
												<input type="tdes" class="form-control" name="tdes" placeholder="Task Description" value="<?php echo "".$result['tdes']."" ?>">
												 
											</div>
									   </div>
									   <div class="form-group ">
										    <label class="control-label col-md-3" for="date">Date-Time:</label>
											<div class="col-md-5"> 
												<input type="date" class="form-control" name="date" placeholder="Task Date-Time" value="<?php echo "".$result['date']."" ?>">
												
											</div>
									   </div>
										<div class="form-group"> 
											<div class="col-md-offset-3 col-md-5 btn-style">
											  <button type="submit" class="btn btn-primary btn-lg " name="update">Update</button>
											</div>
										</div>
									</form>
									<!--End Form-->
							    </div>
						</div>
				    </div>
			    </div>   
			</section>
			<!--End Middle body-->
<?php require('footer/profile_footer.html');?> 	   