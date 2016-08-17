<?php 

    session_start();
	require('db_connection/db_connection.php');
	
	$user="user";
	$admin="admin";
	$admin_mail="cseku.palash2011@gmail.com";
	$message='';
	$error=array();
	require('select_database/dbselect.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['login']))
		{
			$email =$_POST['email'];
			$password =$_POST['pwd'];
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
		   
			//password validation
			if(!empty($password)) 
			{
				
				$password = test_input($password);
				if (strlen($password) <= '8') 
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
				$error['pwd']="Password is required";
			}
			
			if(!empty($error))
			{
				foreach($error as $single_error)
				$message.=$single_error."<br>";
				
			}
			else
			{
				$sql ='SELECT user_email,user_pwd,user_type FROM users WHERE user_email = "'.$email.'" and user_pwd = "'.$password.'"';
				$retval =mysqli_query($db,$sql);
				$count = mysqli_num_rows($retval);
				if($count==1)
				{
					session_start();
					$_SESSION['user_email']=$email;
					while($row = mysqli_fetch_array($retval)) 
				    {
				   
					   $result['email']=$row['user_email'];
					   $result['type']=$row['user_type'];
					   if($result['type']==$user)
					   {
						header("Location:profile_page.php");	
					   }
					   else
					   {
						header("Location:index.php");
						
					   }
				    }
					
				}
				else
				{
					header("Location:Log_in.php"); 
				}
				
				
			}
		
		}
	}
	if(isset($_GET['logout']))
    {
	session_unregister('user_email');
    }
	function test_input($data) 
	{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	} 
?>


<?php require('header/header.html');?>
            <!--Navbar -->
	        <section>
			    <nav class="navbar navbar-style navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<button type = "button" class = "navbar-toggle navbar-btn-style" data-toggle = "collapse" data-target = "#navbar-collapse">
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>				 
							</button>
				            <a class = "navbar-brand" href = "#"> Log In Form </a>
			            </div>
						<!--Right Menu-->
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="reg-form"><a href="Form1.php" ><span class="glyphicon glyphicon-user ricon"></span>Registration</a></li>
							   
							</ul>
						</div>
						<!--Right Menu-->
		           </div>
	
	            </nav>
			</section>
			<!--Main Form-->
	        <section>
				 <div class="container container-bg">
					 <div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Log In Form</div>
							   <div class="panel-body panel-body-style">
							       <div class="alert-danger">
								       <?php if(!empty($message)):?>
									   <p><?php echo $message ?></p>
									   <?php endif ?>
								   </div>
								   <form action="Log_in.php" class="form-horizontal" role="form" method="POST">
								   
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="email">Email:</label>
											<div class="col-md-5"> 
												<input type="email" class="form-control" name="email" placeholder="Enter Your Email">
												<i class="form-control-feedback glyphicon glyphicon-envelope"></i>
											</div>
									   </div>
									   
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="pwd">Password:</label>
											<div class="col-md-5"> 
												<input type="password" class="form-control" name="pwd" placeholder="Enter Your Password">
												<i class="form-control-feedback glyphicon glyphicon-lock"></i>
											</div>
									   </div>
										<div class="form-group"> 
											<div class="col-md-offset-3 col-md-5 btn-style">
											  <button type="submit" class="btn btn-primary btn-lg " name="login">Log In</button>
											</div>
										</div>
									</form>
							   </div>
							</div>
						</div>
					 </div>
				 
				  </div>
		        </section>
		
		
<?php require('footer/footer.html');?>