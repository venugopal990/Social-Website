<?php 

if(isset($_POST['login_button'])){
	$email = $_POST['log_email'];
	$_SESSION['log_email']=$email;
	$password = md5($_POST['log_password']);
	$check_database = mysqli_query($con , "SELECT * FROM users WHERE email='$email' and password='$password'");
	$check_login = mysqli_num_rows($check_database);

	if($check_login==1){
		$rows = mysqli_fetch_array($check_database);
		$username = $rows['username'];
		$user_closed = mysqli_query($con,"SELECT * from users where email='$email' and user_closed='yes'" );
		if(mysqli_num_rows($user_closed)==1){
				mysqli_query($con,"UPDATE users set user_closed='no' where email='$email' "); 
		}

		$_SESSION['username']=$username;
		header("Location: index.php");
		$_SESSION['log_email']="";
		exit();
	}else{
		array_push($error_array,"Email or password was incorrect<br>");
		
	}
}

 ?>