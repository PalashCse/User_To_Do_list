<?php 
    session_start();
    require('db_connection/db_connection.php');
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
				    <!--Start Side Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php?id=<?php echo $uid;?>" class="edit_home-style" >Home</a></li>
							<li class="create_tdlist"><a href="create_tdl.php?id=<?php echo $uid;?>" class="create_tdlist-style" >Create ToDo List</a></li>
							<li class="show"><a href="show_task.php?id=<?php echo $uid;?>" class="show_task-style" >Show Tasks</a></li>
							<li class="pending"><a href="pending_task.php?id=<?php echo $uid;?>" class="pending_task-style" >Pending Tasks</a></li>
							<li class="complete"><a href="complete_task.php?id=<?php echo $uid;?>" class="complete_task-style" >Completed Tasks</a></li>
							<li class="finding"><a href="finding_task.php?id=<?php echo $uid;?>" class="finding_task-style" >Finding Specific Tasks</a></li>
						</ul>
					</div>
					<!--Start Side Menu-->
					<div class="col-md-8 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Add Your Task</div>
						  <div class="panel-body panel-body-style">
						    
						    
							
						  </div>
						</div>					
						
				    </div>
			    </div>   
			</section>
			
<?php require('footer/profile_footer.html');?>