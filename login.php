<?php include "header.php" ?>

<?php 
	if($_SERVER["REQUEST_METHOD"]==="POST"){
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		if(empty($email)|| empty($password)) {
			$message = "Do not leave any empty input!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} else{
			$sql="SELECT * FROM user WHERE email='$email' and password ='$password'";
			$result=$conn->query($sql);
			if ($result->num_rows == 0){
				$message = "Wrong e-mail or password";
				echo "<script>alert('$message');</script>";
			} else{ 
				$user = $result->fetch_assoc();
				#we set ourr session which means user has been logged in
				$_SESSION["userId"] = $user["id"];
				$message = "You have logged in successfully";
				echo "<script>alert('$message');window.location.href='index.php';</script>";
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
							<h2>Log in</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input id="email" name="email" type="email" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input id="password" name="password" type="password" maxlength="25" class="form-control"  length="40">
						</div>
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Sign in</button>
						</div>
						<hr>
						<p></p>Don't you have an account? <a href="signup.php">Sign up</a></p>
					</form>
				</div>
			</div>
		</div>
		<div class="col-2"></div>
	</div>
</div>
<?php include "footer.php" ?>