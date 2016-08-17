<?php 

    require('db_connection/db_connection.php');
	$message='';
	$user="user";
	$admin="admin";
	$admin_mail="cseku.palash2011@gmail.com";
	require('select_database/dbselect.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")	
	{
		$fnameErr = $lnameErr = $emailErr = $sessionErr =$rollErr=$subjectErr=$passwordErr= "";
		$fname = $lname = $email = $session =$roll=$subject=$password= "";
		$error=array();
		if(isset($_POST['submit']))
		{
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$session = $_POST['session'];
			$roll = $_POST['roll'];
			$subject = $_POST['subject'];
			$password = $_POST['pwd'];
			
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
				if($email==$admin_mail)
				{
				   $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_session, user_roll, user_subject,user_pwd,user_type) VALUES ('$fname', '$lname', '$email', '$session', '$roll', '$subject','$password','$admin')";
			
				   $result = mysqli_query($db,$sql);	
				}
				else
				{
					 $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_session, user_roll, user_subject,user_pwd,user_type) VALUES ('$fname', '$lname', '$email', '$session', '$roll', '$subject','$password','$user')";
			
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
				            <a class = "navbar-brand" href = "#"> Registration Form </a>
			            </div>
						<!--Right Menu-->
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="reg-form"><a href="Form1.php" ><span class="glyphicon glyphicon-user ricon"></span>Registration</a></li>
							   <li class="log-form"><a href="Log_in.php" ><span class="glyphicon glyphicon-log-in licon"></span>Log IN</a></li>
							</ul>
						</div>
						<!--Right menu-->
		           </div>
	
	            </nav>
			</section>
			<!--Main Form-->
	        <section>
				 <div class="container container-bg">
					 <div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Registration Form</div>
							   <div class="panel-body panel-body-style">
							       <div class="alert-danger alert-style">
								       <?php if(!empty($message)):?>
									   <p><?php echo $message ?></p>
									   <?php endif ?>
								   </div>
								   <form action="Form1.php" class="form-horizontal" role="form" method="POST">
								   
                                        <div class="form-group has-feedback has-feedback-right">
                                           <label class="control-label col-md-3" for="fname">First Name:</label>
                                           <div class="col-md-5">
                                               <input type="fname" class="form-control" name="fname" placeholder="Enter Your First Name">
											   <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
										</div>
										
                                        <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="lname">Last Name:</label>
											<div class="col-md-5"> 
												<input type="lname" class="form-control" name="lname" placeholder="Enter Your Last Name">
												 <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="email">Email:</label>
											<div class="col-md-5"> 
												<input type="email" class="form-control" name="email" placeholder="Enter Your Email">
												<i class="form-control-feedback glyphicon glyphicon-envelope"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="pwd">Session:</label>
											<div class="col-md-5"> 
												<input type="session" class="form-control" name="session" placeholder="Enter Your Session">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="roll">Roll:</label>
											<div class="col-md-5"> 
												<input type="roll" class="form-control" name="roll" placeholder="Enter Your roll">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="subject">Subject:</label>
											<div class="col-md-5"> 
												<input type="subject" class="form-control" name="subject" placeholder="Enter Your Subject Name">
												<i class="form-control-feedback glyphicon glyphicon-book"></i>
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
											  <button type="submit" class="btn btn-primary btn-lg " name="submit">Submit</button>
											</div>
										</div>
									</form>
							   </div>
							</div>
						</div>
					 </div>
				 
				  </div>
		        </section>
		      <!--End Form-->
<?php require('footer/footer.html');?>