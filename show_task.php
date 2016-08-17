<?php 
    session_start();
    require('db_connection/db_connection.php');
	require('user_id/uid.php');
	require('task_id/taskid.php');
	require('select_database/dbselect.php');
	
    

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
							<li class="home"><a href="profile_page.php?id=<?php echo $uid;?>" class="edit_home-style" >Home</a></li>
							<li class="show"><a href="show_task.php?id=<?php echo $uid;?>" class="show_task-style" >Show Tasks</a></li>
							<li class="pending"><a href="pending_task.php?id=<?php echo $uid;?>" class="pending_task-style" >Pending Tasks</a></li>
							<li class="complete"><a href="completed_task.php?id=<?php echo $uid;?>" class="complete_task-style" >Completed Tasks</a></li>
							<li class="finding"><a href="finding_task.php?id=<?php echo $uid;?>" class="finding_task-style" >Finding Specific Tasks</a></li>
						</ul>
					</div>
					<!--End Side Menu-->
					<!--Start Datatable-->
					<div class="col-md-9  col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Your Task List</div>
						  <div class="panel-body panel-body-style">
						    <div class="row">
								<div class="col-md-12">
									 <table class="table">
										<thead>
										  <tr>
											<th>Task Title</th>
											<th>Task Description</th>
											<th>Date-Time</th>
											<th>Status</th>
											<th>Task Actions</th>
											<th>Status Edit</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$sql ='SELECT task_id,task_title,task_description,date,task_status FROM to_do_lists where user_id="'.$uid.'"';
							                    $results = mysqli_query($db,$sql);
												while($row = mysqli_fetch_array($results))
												{
											?>
											<tr>
											   <td><?php echo $row['task_title']; ?></td>
											   <td><?php echo $row['task_description']; ?></td>	
											   <td><?php echo $row['date']; ?></td>	
											   <td><?php echo $row['task_status']; ?></td>	
											   <td>
											      <a href="edit_task.php?id=<?php echo $uid;?>&tid=<?php echo $row['task_id'];?>" class="btn btn-warning">Edit</a>
												  <a onclick="return confirm('Are you sure?')" href="delete_task.php?id=<?php echo $uid;?>&tid=<?php echo $row['task_id'];?>" class="btn btn-danger">Delete</a>
											   </td>
											       
											   <td>
												   <form action="status_update.php?id=<?php echo $uid;?>&tid=<?php echo $row['task_id'];?>" method="post">
														<select name="select_status">
															<option value="In Progress">In Progress</option>
															<option value="Completed">Completed</option>
														</select>
														<button type="submit" class="btn btn-warning " name="update">Update</button>
													</form>
											   </td>
											   
											   
											</tr>
										  
										  
											<?php
												}
												
											?>
										</tbody>
									  </table>
								</div>
							</div>
							
						  </div>
						</div>					
						
				    </div>
					<!--End Datatable-->
			    </div>   
			</section>
			<!--End Middle Body-->
<?php require('footer/profile_footer.html');?> 
