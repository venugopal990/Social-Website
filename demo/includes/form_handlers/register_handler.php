<?php
$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date="";
$error_array=array();

	if(isset($_POST['register_button'])){

		//First Name
		$fname= strip_tags($_POST['reg_fname']);//Remove html tags
		$fname= str_replace(' ', '', $fname); //Remove spaces
		$fname = ucfirst(strtolower($fname)); //Uppercase First Letter
		$_SESSION['reg_fname']=$fname; //Store first name into session variable

		//Last Name
		$lname= strip_tags($_POST['reg_lname']);
		$lname= str_replace(' ', '', $lname);
		$lname = ucfirst(strtolower($lname));
		$_SESSION['reg_lname']=$lname; 



		//Email
		$em= strip_tags($_POST['reg_email']);
		$em= str_replace(' ', '', $em);
		$em = ucfirst(strtolower($em));
		$_SESSION['reg_email']=$em; 

		//Email2
		$em2= strip_tags($_POST['reg_email2']);
		$em2= str_replace(' ', '', $em2);
		$em2= ucfirst(strtolower($em2));
		$_SESSION['reg_email2']=$em2;

		//Password
		$password= strip_tags($_POST['reg_password']);

		//Password2
		$password2= strip_tags($_POST['reg_password2']);

		//Date
		$date = date("Y-m-d");

		if($em==$em2){
			//check if email is valid format or not
			if(filter_var($em,FILTER_VALIDATE_EMAIL)){

				$em = filter_var($em,FILTER_VALIDATE_EMAIL);
				//check if email already exists
				$e_check  = mysqli_query($con , "SELECT email From users where email='$em'");
				$num_rows = mysqli_num_rows($e_check);
				if($num_rows>0){
					array_push($error_array, "Email id is already exists<br>");
					
				}

			}else{
				array_push($error_array, "Invalid Email Format<br>");
				
			}

		}else{
			array_push($error_array, "Email don't match<br>");
			
		}


		if($password!=$password2){
			array_push($error_array, "Your passwords do not matched<br>");
			
		}
		//main work starts
		if(empty($error_array)){
			$password = md5($password);

			//generating username
			$username = strtolower($fname."_".$lname);
			$check_username = mysqli_query($con,"SELECT username from users where username = '$username'");

			$i=0;
			while(mysqli_num_rows($check_username)!=0){
				$username = strtolower($fname."_".$lname);
				$i++;
				$username = $username."_".$i;
				$check_username = mysqli_query($con,"SELECT username from users where username = '$username'");
				
			}
			//profile_pic
		
			$rand = rand(1,6);

			if($rand == 1) $profile_pic = "assets/images/profile_pics/defaults/head_alizarin.png";
			else if($rand == 2) $profile_pic = "assets/images/profile_pics/defaults/head_amethyst.png";
			else if($rand == 3) $profile_pic = "assets/images/profile_pics/defaults/head_belize_hole.png";
			else if($rand == 4) $profile_pic = "assets/images/profile_pics/defaults/head_carrot.png";
			else if($rand == 5) $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
			else if($rand == 6) $profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";

			$query = mysqli_query($con , "INSERT into users VALUES('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0','0','no',',')");
			array_push($error_array, "<span style='color: #14C800'>Registration Completed Successful</span><br>");
			
			//clear session
			$_SESSION['reg_fname']="";
			$_SESSION['reg_lname']="";
			$_SESSION['reg_email']="";
			$_SESSION['reg_email2']="";

		}

	}
	?>