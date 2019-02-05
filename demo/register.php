<?php 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Connectin</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php 
	if(isset($_POST['register_button'])){
		echo'
			<script>
				$(document).ready(function(){
					$("#first").hide();
					$("#second").show();
					});


			</script>
		';
	}

	/* if (isset($_SESSION['username'])){
 	header("Location: index.php");
 }*/

	 ?>

<div class="wrapper">

	<div class="login_box">
		<div class="login_header">
		<h1>Connectin!</h1>
		Login or sign up below!
		</div>
		<div id="first">
				<!---login form---->
				<form method="POST" action="register.php">
				<input type="email" name="log_email" placeholder="Email Address" value="<?php
					if(isset($_SESSION['log_email'])){
						echo $_SESSION['log_email'];
					}
					?>" required>	<br>
				<input type="password" name="log_password" placeholder="password">	<br>
				<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>";?>
				<input type="submit" name="login_button" value="Login"><br>
				<a href="#" id="signup" class="signup" >Sign up for Connectin</a>
				</form>
				<br>
		</div>

		<div id="second">
			<!---register form---->
			<form method="POST" action="register.php">
				<input type="text" name="reg_fname" placeholder="First Name" value="<?php
				if(isset($_SESSION['reg_fname'])){
					echo $_SESSION['reg_fname'];
				}
				?>" required>
				<br>
				<input type="text" name="reg_lname" placeholder="Last Name" value="<?php
				if(isset($_SESSION['reg_lname'])){
					echo $_SESSION['reg_lname'];
				}
				?>" required>
				<br>
				<input type="email" name="reg_email" placeholder="Email" value="<?php
				if(isset($_SESSION['reg_email'])){
					echo $_SESSION['reg_email'];
				}
				?>" required>
				<br>
				

				<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
				if(isset($_SESSION['reg_email2'])){
					echo $_SESSION['reg_email2'];
				}
				?>" required>
				<br>
				<?php if (in_array("Email id is already exists<br>", $error_array)) echo "Email id is already exists<br>"; 
				 else if (in_array("Invalid Email Format<br>", $error_array)) echo "Invalid Email Format<br>"; 
				 else if (in_array("Email don't match<br>", $error_array)) echo "Email don't match<br>"; ?>

				<input type="password" name="reg_password" placeholder="password"  required>
				<br>
				<input type="password" name="reg_password2" placeholder="Confirm password" required>
				<br>
				<?php if (in_array("Your passwords do not matched<br>", $error_array)) echo "Your passwords do not matched<br>"; ?>
				<input type="submit" name="register_button" value="Register">
				<br>
				<?php if (in_array("<span style='color: #14C800'>Registration Completed Successful</span><br>", $error_array)) echo "<span style='color: #14C800'>Registration Completed Successful</span><br>"; ?>
				<a href="#" id="signin" class="signin" >Already have an account? Sign in here!</a>
			</form>
		</div>
	</div>	
</div>
</body>
</html> 