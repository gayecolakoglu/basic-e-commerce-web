
<?php
	#we get name of inputs :firstName ,email ,lastName ,password ,passwordAgain from admin forms
	$name = $_POST["firstName"];
	$email = $_POST["email"];
	$lastName = $_POST["lastName"];
	$password = $_POST["password"];
	$passwordAgain = $_POST["passwordAgain"];
	
	if(empty($name) || empty($email) || empty($lastName) || empty($password) || empty($passwordAgain) ) {
		$message = "Do not leave any empty input!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}else{
		if($password != $passwordAgain) {
			$message = "Passwords are not same , check again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else{
			$sql = "SELECT * FROM user where email='$email'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				$message = "This e-mail is already exist,try another one";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}else{
				$sql = "INSERT INTO user (name,password,email,lastName,admin) VALUES ('$name','$password','$email','$lastName','1')";
				$result = $conn->query($sql);
				$message = "New admin account has been created";
				echo "<script>alert('$message');</script>";
			}
		}
	}
?>
