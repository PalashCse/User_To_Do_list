<?php 

    
    session_start();
    require('db_connection/db_connection.php');
	//Email Check
	$email=$_SESSION['user_email'];
	if(!isset($email)){

		header("Location: log_in.php");
	}
	
	$message='';
	$message2='';
	$result=array();
	$error=array();
	require('select_database/dbselect.php');
	//User id
	$id= mysqli_query($db,"select user_id from users where user_email = '$email'");
    $got = mysqli_fetch_assoc($id);
    $uid=implode(" ",$got);
	
	//Initialization
	$result['fname']=$result['lname']=$result['email']= $result['session']=$result['roll']=$result['subject']=$result['pwd']="";
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//Show Data
		if(isset($_POST['show']))
		{
				$sql = 'SELECT user_fname,user_lname,user_email,user_session,user_roll,user_subject,user_pwd FROM users where user_id="'.$uid.'"';
				$retval =mysqli_query($db,$sql);
				if(! $retval ) 
			   {
				  die('Could not get data: ' . mysqli_error());
			   }
				while($row = mysqli_fetch_array($retval)) 
				 {
				   
				   $result['fname']=$row['user_fname'];
				   $result['lname']=$row['user_lname'];
				   $result['email']=$row['user_email'];
				   $result['session']=$row['user_session'];
				   $result['roll']=$row['user_roll'];
				   $result['subject']=$row['user_subject'];
				   $result['pwd']=$row['user_pwd']; 
				 }
				
		}
		
		if(isset($_POST['update']))
		{
			if(isset($_POST['fname'])){ $fname = $_POST['fname']; } 
			if(isset($_POST['lname'])){ $lname = $_POST['lname']; } 
			if(isset($_POST['email'])){ $email = $_POST['email']; }
			if(isset($_POST['session'])){ $session = $_POST['session']; }
			if(isset($_POST['roll'])){ $roll = $_POST['roll']; }
			if(isset($_POST['subject'])){ $subject = $_POST['subject']; }
			if(isset($_POST['pwd'])){ $password = $_POST['pwd']; }
			
			
			//First name validation
			if(empty($fname))
			{
				 $error['fname'] = "First Name is required";
			}
			else
			{
				$fname = test_input($fname);
				 if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
				 {
					$error['fname'] = "Your First Name Must Contain Letters and White Spaces!"; 
				 }
				 
			}
			//last name validation
			if(empty($lname))
			{
				 $error['lname'] = "Last Name is required";
			}
			else
			{
				$lname = test_input($lname);
				 if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
				 {
					$error['lname'] = "Your Last Name Must Contain Letters and White Spaces!"; 
				 }
				
			}
			//Email validation
			if(empty($email))
			{
				 $error['email'] = "Email is required";
			}
			else
			{
				$email = test_input($email);
				 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				 {
					$error['email'] = "Invalid email format"; 
				 }
				
			}
			//sesion validation
			if(empty($session))
			{
				 $error['session'] = "session is required";
			}
			else
			{
				$session = test_input($session);
				 if (!preg_match("/(\d{4})-(\d{4})/",$session)) 
				 {
					$error['session'] = "Your Session Must Contain Numbers(4 digits)-Numbers(4 digits)!"; 
				 }
				
			}
			//roll validation
			if(empty($roll))
			{
				 $error['roll'] = "Roll is required";
			}
			else
			{
				$roll = test_input($roll);
				if(!preg_match("/^[1-9][0-9]{0,15}$/",$roll))
				{
					 $error['roll'] = "Your Roll Must Contain Numbers!";
				}
				 
			}
			//subject validation
			if(empty($subject))
			{
				 $error['subject'] = "Subject is required";
			}
			else
			{
				$subject = test_input($subject);
				if(!preg_match("#[A-Za-z]+#",$subject))
				{
					 $error['subject'] = "Your subject Must Contain Letters!";
				}
				
			}
			//password validation
			if(!empty($password))
			{
				$password = test_input($password);
				if (strlen($_POST["pwd"]) <= '8') 
				{
					 $error['pwd'] = "Your Password Must Contain At Least 8 Characters!";
				}
				elseif(!preg_match("#[0-9]+#",$password))
				{
					 $error['pwd'] = "Your Password Must Contain At Least 1 Number!";
				}
				elseif(!preg_match("#[A-Z]+#",$password)) 
				{
					 $error['pwd'] = "Your Password Must Contain At Least 1 Capital Letter!";
				}
				elseif(!preg_match("#[a-z]+#",$password))
				{
					 $error['pwd']= "Your Password Must Contain At Least 1 Lowercase Letter!";
				}
					
				
				 
			}
			else
			{
				$error['pwd'] = "password is Required";
			}
				
				
			
			/*data inserted into database*/
			if(!empty($error))
			{
				foreach($error as $single_error)
				$message.=$single_error."<br>";
				
			}
			else
			{
				$sql='UPDATE users SET user_fname="'.$fname.'", 
				                      user_lname="'.$lname.'",
									  user_email="'.$email.'",
									  user_session="'.$session.'",
									  user_roll="'.$roll.'",
									  user_subject="'.$subject.'",
									  user_pwd="'.$password.'" WHERE user_email="'.$email.'"';
				$result=mysqli_query($db, $sql);
				if($result)
				{
					?>
					 <script>
						alert("Data Successfully Updated");
					 </script>
					 <?php
				}
			}	
			mysqli_close($db);
		}
		
	}		
	function test_input($data) 
	{
	    $data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
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
				    <!--start Menubar-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php?id=<?php echo $uid;?>" class="home-style" >Home</a></li>
							<li class="update"><a href="profile_page.php?id=<?php echo $uid;?>" class="update-style" >Update</a></li>
							<li class="delete"><a href="delete-page.php?id=<?php echo $uid;?>" class="delete-style" >Delete</a></li>
							<li class="create_tdlist"><a href="create_tdl.php?id=<?php echo $uid;?>" class="create_tdlist-style" >Create ToDo List</a></li>
							<li class="edit_tdlist"><a href="edit_todo.php?id=<?php echo $uid;?>" class="edit_tdlist-style" >Edit ToDo List</a></li>
							
						</ul>
					</div>
					<!--End Menubar-->
					<!--start Middle body-->
					<div class="col-md-7 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Update Your Data</div>
						  <div class="panel-body panel-body-style">
						     <form action="profile_page.php" class="form-horizontal" role="form" method="POST">
								<div class="form-group has-feedback has-feedback-right">
                                    <label class="control-label col-md-3" for="show">Show All Data:</label>
                                     <div class="col-md-5 btn-style">
										<button type="submit" class="btn btn-primary btn-lg " name="show">Show</button>
									</div> 
									
								</div>
							 </form>
						  </div>
						</div>					
						<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Welcome User</div>
							   <div class="panel-body panel-body-style">
							       <div class="alert-danger alert-style">
								     <?php if(!empty($message)):?>
									   <p><?php echo $message ?></p>
									   <?php endif ?>  
								   </div>
								   <!--start Form-->
								   <form action="profile_page.php" class="form-horizontal" role="form" method="POST">
								   
                                        <div class="form-group has-feedback has-feedback-right">
                                           <label class="control-label col-md-3" for="fname">First Name:</label>
                                           <div class="col-md-5">
                                               <input type="fname" class="form-control" name="fname" placeholder="Enter Your First Name" value="<?php echo "".$result['fname']."" ?>">
											   <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
										</div>
										
                                        <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="lname">Last Name:</label>
											<div class="col-md-5"> 
												<input type="lname" class="form-control" name="lname" placeholder="Enter Your Last Name" value="<?php echo "".$result['lname']."" ?>">
												 <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="email">Email:</label>
											<div class="col-md-5"> 
												<input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="<?php echo "".$result['email']."" ?>">
												<i class="form-control-feedback glyphicon glyphicon-envelope"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="pwd">Session:</label>
											<div class="col-md-5"> 
												<input type="session" class="form-control" name="session" placeholder="Enter Your Session" value="<?php echo "".$result['session']."" ?>">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="roll">Roll:</label>
											<div class="col-md-5"> 
												<input type="roll" class="form-control" name="roll" placeholder="Enter Your roll" value="<?php echo "".$result['roll']."" ?>">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="subject">Subject:</label>
											<div class="col-md-5"> 
												<input type="subject" class="form-control" name="subject" placeholder="Enter Your Subject Name" value="<?php echo "".$result['subject']."" ?>">
												<i class="form-control-feedback glyphicon glyphicon-book"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="pwd">Password:</label>
											<div class="col-md-5"> 
												<input type="password" class="form-control" name="pwd" placeholder="Enter Your Password" value="<?php echo "".$result['pwd']."" ?>">
												<i class="form-control-feedback glyphicon glyphicon-lock"></i>
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
					<!--End Middle body-->
			    </div>   
			</section>
			
<?php require('footer/footer.html');?>    