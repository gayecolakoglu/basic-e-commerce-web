<?php include "header.php" ?>

<?php 
	#we used hidden inputs in forms, which names is postValue for understand that which form  we are in. 
	if($_SERVER["REQUEST_METHOD"]==="POST"){
		if($_POST["postValue"]=="createAdmin"){
			include "adminActions/createAdmin.php";
		}else if($_POST["postValue"]=="addProduct"){
			include "adminActions/addProduct.php";
		}else if($_POST["postValue"]=="deleteProduct"){
			include "adminActions/deleteProduct.php";
		}else if($_POST["postValue"]=="updateProduct"){
			include "adminActions/updateProduct.php";
		}else if($_POST["postValue"]=="cancelOrder"){
			include "adminActions/order.php";
		}
	}
?>

<div class="container">
	<div class="row mt-5">
		<div class="col-5">	
			<h3>Select Operation </h3>
			<hr>
			<!-- this code is for show radio buttons we use names and values in the js ,footer-->
			<!-- values must be same as form id's because in js (at footer) we use $(this).val() 
				which equal to form id to understand which form we are calling-->
			<input type="radio"  name="actionGroup" value="add">
			<label for="male">Add Product</label><br><br>
			<input type="radio"  name="actionGroup" value="createAdmin">
			<label for="female">Create Admin</label><br><br>
			<input type="radio"  name="actionGroup" value="update">
			<label for="female">Update Product</label><br><br>
			<input type="radio"  name="actionGroup" value="delete">
			<label for="female">Delete Product</label><br><br>
			<input type="radio"  name="actionGroup" value="cancelOrder">
			<label for="female">Order</label><br>
		</div>
		<div class="col-2"></div>

		<div class="col-5" >
			<!--enctype="multipart/form-data" =>This value is necessary if the user will upload a file through the form  -->
			<form method="post" id="add" style="display:none;" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h3>Add Product</h3>
				<hr>
				<div class="form-group mt-3">
					<label for="addName">Name</label>
					<input type="text" class="form-control" id="addName" name="productName">
				</div>
				<div class="form-group mt-3">
					<label for="desc">Description</label>
					<input type="text" class="form-control" id="desc" name="desc">
				</div>
				<div class="form-group">
					<label for="selectCat">Select category name</label>
					<select class="form-control" id="selectCat" name ="category">
						<option value=""></option>
						<option value="bodylotion">Body Lotion</option>
						<option value="suntancream">Suntan Cream</option>
						<option value="toothbrush">Toothbrush</option>
						<option value="toothpaste">Toothpaste</option>
						<option value="deodorant">Deodorant</option>
						<option value="shampoo">Shampoo</option>
					</select>
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" class="form-control" id="price" name="price">
				</div>
				<div class="form-group">
					<label for="img">Image</label>
					<input type="file" class="form-control" id="img" name="img">
				</div>
				<div class="form-group">
						<button id="productSubmit" type="submit" class="btn btn-info btn-block">Create new product</button>
						<input type="hidden" name="postValue" id="" value="addProduct">
				</div>
			</form>
			<form method="post" id="update" style="display:none;" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h3>Update Product</h3>
				<hr>
				<div class="form-group">
					<label for="updateProduct">Select product name you want to update</label>
					<select class="form-control" id="updateProduct" name ="updateProduct">
						<option value=""></option>
						<?php
							$sql = "SELECT * FROM product";
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()) {
								$id = $row["id"];
								$name = $row["name"];
								echo "<option value = '$id' > $name </option>";
							}
						?>
					</select>
				</div>
				<div class="form-group mt-3">
					<label for="addName">Name</label>
					<input type="text" class="form-control" name="productName">
				</div>
				<div class="form-group mt-3">
					<label for="desc">Description</label>
					<input type="text" class="form-control" name="desc">
				</div>
				<div class="form-group">
					<label for="updateCat">Select category name you want to update</label>
					<select class="form-control" id="updateCat" name ="category">
						<option value=""></option>
						<option value="bodylotion">Body Lotion</option>
						<option value="suntancream">Suntan Cream</option>
						<option value="toothbrush">Toothbrush</option>
						<option value="toothpaste">Toothpaste</option>
						<option value="deodorant">Deodorant</option>
						<option value="shampoo">Shampoo</option>
					</select>
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" class="form-control" name="price">
				</div>
				<div class="form-group">
					<label for="img">Image</label>
					<input type="file" class="form-control" name="img">
				</div>
				<div class="form-group">
					<input type="hidden" name="postValue" id="" value="updateProduct">
					<button id="updateSubmit" type="submit" class="btn btn-info btn-block">Update product info</button>
				</div>
			</form>
			<form method="post" id="delete" style="display:none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Delete Product</h3>
					<hr>
					<div class="form-group">
						<label for="deleteProduct">Select product name you want to delete</label>
						<select class="form-control" id="deleteProduct" name ="deleteProduct">
							<option value=""></option>
							<?php
								$sql = "SELECT * FROM product";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc()) {
									$id = $row["id"];
									$name = $row["name"];
									echo "<option value = '$id' > $name </option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<button id="deleteSubmit" type="submit" class="btn btn-info btn-block">Delete product</button>
						<input type="hidden" name="postValue" id="" value="deleteProduct">
					</div>
			</form>
			<form method="post" id="createAdmin" style="display:none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Create Admin</h3>
					<hr>
					<div class="form-group mt-3">
						<label for="adminName">Name</label>
						<input type="text" class="form-control" id="adminName" name="firstName">
					</div>
					<div class="form-group mt-3">
						<label for="adminLastName">Last Name</label>
						<input type="text" class="form-control" id="adminLastName" name="lastName">
					</div>
					<div class="form-group mt-3">
						<label for="adminEmail">Email</label>
						<input type="email" class="form-control" id="adminEmail" name="email">
					</div>
					<div class="form-group">
						<label for="adminPassword">Password</label>
						<input type="password" class="form-control" id="adminPassword" name="password">
					</div>
					<div class="form-group">
						<label for="adminPasswordAgain">Confirm Password</label>
						<input type="password" class="form-control" id="adminPasswordAgain" name="passwordAgain">
					</div>
					<div class="form-group">
							<button id="adminSubmit" type="submit" class="btn btn-info btn-block">Create new admin</button>
							<input type="hidden" name="postValue" id="" value="createAdmin">
					</div>
			</form>
			<form method="post" id="cancelOrder" style="display:none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Orders</h3>
					<hr>
					<div class="form-group">
						<label for="cancelOrder2">Select order id you want to cancel</label>
						<select class="form-control" id="cancelOrder2" name ="cancelOrder">
							<option value=""></option>
							<?php
								$sql = "SELECT * FROM orders";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc()) {
									$id = $row["id"];
									echo "<option value = '$id' > $id </option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<button  id="" type="submit" class="btn btn-info btn-block">Cancel order</button>
						<input type="hidden" name="postValue" id="" value="cancelOrder">
					</div>
			</form>
		</div>
	</div>
</div>

<?php include "footer.php" ?>