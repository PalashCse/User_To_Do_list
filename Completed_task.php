<?php 
    session_start();
    require('db_connection/db_connection.php');
	$uid='';
	$taskstatus='Completed';
	require('user_id/uid.php');
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
			<section>
			    <div class="row row-style">
				    <!--Start Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php?id=<?php echo $uid;?>" class="edit_home-style" >Home</a></li>
							<li class="show"><a href="show_task.php?id=<?php echo $uid;?>" class="show_task-style" >Show Tasks</a></li>
							<li class="pending"><a href="pending_task.php?id=<?php echo $uid;?>" class="pending_task-style" >Pending Tasks</a></li>
							<li class="complete"><a href="completed_task.php?id=<?php echo $uid;?>" class="complete_task-style" >Completed Tasks</a></li>
							<li class="finding"><a href="finding_task.php?id=<?php echo $uid;?>" class="finding_task-style" >Finding Specific Tasks</a></li>
						</ul>
					</div>
					<!--End Menu-->
					<!--start complted task table-->
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
										  </tr>
										</thead>
										<tbody>
											<?php 
												$sql ='SELECT task_id,task_title,task_description,date,task_status FROM to_do_lists where user_id="'.$uid.'" and task_status="'.$taskstatus.'" ';
							                    $results = mysqli_query($db,$sql);
												while($row = mysqli_fetch_array($results))
												{
											?>
											<tr>
											   <td><?php echo $row['task_title']; ?></td>
											   <td><?php echo $row['task_description']; ?></td>	
											   <td><?php echo $row['date']; ?></td>	
											   <td><?php echo $row['task_status']; ?></td>
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
					<!--End complted task table-->
			    </div>   
			</section>
			
<?php require('footer/profile_footer.html');?> 	
