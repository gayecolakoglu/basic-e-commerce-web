<?php include "header.php" ?>

<?php 
	if($_SERVER["REQUEST_METHOD"]==="POST"){
		$email = $_POST["email"];
		$name = $_POST["name"];
		$lastname = $_POST["lastname"];
		$password = $_POST["password"];
		$passwordAgain = $_POST["passwordAgain"];

		$sql = "SELECT * FROM user where email='$email'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$user = $result->fetch_assoc();
			if ( $user["id"]!=$_SESSION["userId"]){
				$message = "This e-mail is already exist,try another one";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} else{
				if(!empty($password) && !empty($passwordAgain)){
					if($password == $passwordAgain){
						$sql = "UPDATE  user SET name = '$name', email = '$email', lastname='$lastname', password='$password' WHERE id=".$_SESSION['userId'];
						$result = $conn->query($sql);
						$message = "Your account has been updated";
						echo "<script>alert('$message');</script>";
					}else{
						$message = "Passwords are not equal";
						echo "<script>alert('$message');</script>";
					}
				}
																																					
				else{
					$sql = "UPDATE  user SET name = '$name', email = '$email', lastname='$lastname'  WHERE id=".$_SESSION['userId'];
					$result = $conn->query($sql);
					$message = "Your account has been updated";
					echo "<script>alert('$message');</script>";
				}
				
				}
		} else{
				if(!empty($password) && !empty($passwordAgain)){
					if($password == $passwordAgain){
						$sql = "UPDATE  user SET name = '$name', email = '$email', lastname='$lastname', password='$password' WHERE id=".$_SESSION['userId'];
						$result = $conn->query($sql);
						$message = "Your account has been updated";
						echo "<script>alert('$message');</script>";
					}else{
						$message = "Passwords are not equal";
						echo "<script>alert('$message');</script>";
					}
				}
																																					
				else{
					$sql = "UPDATE  user SET name = '$name', email = '$email', lastname='$lastname'  WHERE id=".$_SESSION['userId'];
					$result = $conn->query($sql);
					$message = "Your account has been updated";
					echo "<script>alert('$message');</script>";
				}
		}

	}
?>


	<div class="container">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="row mt-5">
				<div class="col-5">
					<?php 
						$sql = "SELECT * FROM user WHERE id=".$_SESSION['userId'];
						$result=$conn->query($sql);
						$user =$result->fetch_assoc();
						$email = $user['email'];
						$name = $user['name'];
						$lastname = $user['lastname'];
					?>
					<h3>Account Information</h3>
					<hr>
					<div class="form-group mt-3">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
					</div>
					<div class="form-group">
						<label for="lastname">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="check" name="check">
						<label class="form-check-label" for="check">Change Password</label>
					</div>
					<button type="submit" class="btn btn-secondary  my-2 my-sm-0">Save</button>
				</div>
				<div class="col-2"></div>
				<div class="col-5" style="display:none;" id="hiddenPart">
					<h3>Password</h3>
					<hr>
					<div class="form-group mt-3">
							<label for="email">New Password</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group">
							<label for="passwordAgain">Confirm Password</label>
							<input type="password" class="form-control" id="passwordAgain" name="passwordAgain">
						</div>
				</div>
			</div>
		</form>
	</div>
	
<?php include "footer.php" ?>
