<?php 

	session_start();
    require('db_connection/db_connection.php');
	require('user_id/uid.php');
	$status="New";
	$message='';
	$message2='';
	$result=array();
	$error=array();
	require('select_database/dbselect.php');
    
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
			//Task inserted into database
			$title = $_POST['ttitle']; 
			$description = $_POST['tdes'];  
			$datetime = $_POST['date-time'];
			
			
			if(empty($title))
			{
				 $error['ttile'] = "Task Title is Required";
			}
			if(empty($description))
			{
				$error['tdes'] = "Task Description is Required";
			}
			if(!empty($error))
			{
				foreach($error as $single_error)
				$message.=$single_error."<br>";
				
			}
			else
			{
				
					$sql = "INSERT INTO to_do_lists (user_id, task_title, task_description, date, task_status) VALUES ('$uid', '$title', '$description', '$datetime', '$status')";
			
				   $result = mysqli_query($db,$sql);
				   if($result)
				{
					?>
					 <script>
						alert("Data Successfully Inserted");
					 </script>
					 <?php
				}
				
				
				
			}
			 mysqli_close($db);
	    }
	
	}
	



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
			<section>
			    <div class="row row-style">
				    <!--Start Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php?id=<?php echo $uid;?>" class="home-style" >Home</a></li>
							<li class="update"><a href="profile_page.php?id=<?php echo $uid;?>" class="update-style" >Update</a></li>
							<li class="delete"><a href="delete-page.php?id=<?php echo $uid;?>" class="delete-style" >Delete</a></li>
							<li class="create_tdlist"><a href="create_tdl.php?id=<?php echo $uid;?>" class="create_tdlist-style" >Create ToDo List</a></li>
							<li class="edit_tdlist"><a href="edit_todo.php?id=<?php echo $uid;?>" class="edit_tdlist-style" >Edit ToDo List</a></li>
						</ul>
					</div>
					<!--End Menu-->
					<div class="col-md-8 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Add Your Task</div>
						  <div class="panel-body panel-body-style">
						    <div class="alert-danger alert-style">
								<?php if(!empty($message)):?>
							    <p><?php echo $message ?></p>
								<?php endif ?>
						    </div>
							<!--Start Form-->
						    <form method="POST" action="create_tdl.php?id=<?php echo $uid; ?>" class="form-horizontal" role="form" >
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="ttitle">Task Title:</label>
                                    <div class="col-md-5">
                                    <input type="ttitle" class="form-control" name="ttitle" placeholder="Your Task Title">
									</div>
								</div>
								<div class="form-group">
                                    <label class="control-label col-md-3" for="tdes">Task Description:</label>
                                    <div class="col-md-5">
                                    <input type="tdes" class="form-control" name="tdes" placeholder="Your Task Description">
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-right">
									<label class="control-label col-md-3" for="date-time">Date-Time:</label>
									<div class="col-md-5"> 
										<input type="text" class="form-control"id="datetimepicker" name="date-time" placeholder="Your Task Date">
										<i class="form-control-feedback glyphicon glyphicon-calendar"></i>
									</div>
							    </div>
								<div class="form-group has-feedback has-feedback-right"> 
									<div class="col-md-offset-3 col-md-5 btn-style">
										<button type="submit" class="btn btn-primary btn-lg " name="submit">Submit</button>
									</div>
								</div>
							</form>
							<!--End Form-->
						  </div>
						</div>					
						
				    </div>
			    </div>   
			</section>
	<?php require('footer/profile_footer.html');?> 		
	    