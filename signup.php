<?php include "header.php" ?>
<?php 
	if($_SERVER["REQUEST_METHOD"]==="POST"){
		#we used post instead of get because we dont wanna show our data in the url
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
					$sql = "INSERT INTO user (name,password,email,lastName) VALUES ('$name','$password','$email','$lastName')";
					$result = $conn->query($sql);
					$message = "Your account has been created, please log in";
					echo "<script>alert('$message');window.location.href='login.php';</script>";
				}
			}
		}
	}
?>
<div class="container">
	<div class="row mt-5">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="panel panel-primary">
				<div class="panel-body">
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form">
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="firstName">First name</label>
							<input id="firstName" name="firstName" type="text" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="lastName">Last Name</label>
							<input id="lastName" name="lastName" type="text" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input id="email" name="email" type="email" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input id="password" name="password" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
						</div>
						<div class="form-group">
							<label class="control-label" for="passwordAgain">Password again</label>
							<input id="passwordAgain" name="passwordAgain" type="password" maxlength="25" class="form-control">
						</div>
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account</button>
						</div>
						<hr>
						<p></p>Already have an account? <a href="login.php">Log in</a></p>
					</form>
				</div>
			</div>
		</div>
		<div class="col-2"></div>
	</div>
</div>

<?php include "footer.php" ?>