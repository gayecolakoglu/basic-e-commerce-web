<?php include "header.php" ?>
<!-- php code for modal-->
<?php 
			if($_SERVER["REQUEST_METHOD"]==="POST"){
				$address = $_POST["address"];
				$payment = $_POST["paymentMethod"];
				$num = $_POST["cardNumber"];
				$totalPrice = $_POST["totalPrice"];
				$userId = $_SESSION["userId"];

				if(empty($address) || empty($payment) || empty($num)) {
					$message = "Do not leave any empty input!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} else{
						$sql = "INSERT INTO orders (userId, address, totalPrice) VALUES ('$userId', '$address', '$totalPrice')";
						$result = $conn->query($sql);
						# ı take last inserted order id
						$orderId = $conn->insert_id;
						foreach($_SESSION['basket'] as $productId => $value){
							$sql = "INSERT INTO order_product (orderId, productId) VALUES ('$orderId', '$productId')";
							$conn->query($sql);
						}
						#we clean the basket after buying
						unset($_SESSION['basket']);
						$message = "Your order has been received!";
						echo "<script>alert('$message');</script>";
				}
			}

      if(isset($_GET['action']) && $_GET['action']=="add"){
        $id=intval($_GET['id']);
				# ı check if there exist $id in basket
        if(!isset($_SESSION['basket'][$id])){
          $sql = "SELECT * FROM product WHERE id=$id";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $name = $row["name"];
          $price = $row["price"];
          $img = $row["img"];
		  		# ı create array named basket in my session and ı add key->value into my array like $id->array("name"=>$name,"price"=>$price, "img"=>$img)
          $_SESSION["basket"][$id] =array("name"=>$name,"price"=>$price, "img"=>$img) ;
        } 
      } else if(isset($_GET['action']) && $_GET['action']=="delete"){
					$id=intval($_GET['id']);
					if(isset($_SESSION['basket'][$id])){
						unset($_SESSION['basket'][$id]);
					}
			} else if(isset($_GET['action']) && $_GET['action']=="buyError"){
					$message = "Please log in before buy anything!";
					echo "<script>alert('$message');</script>";
			} else if(isset($_GET['action']) && $_GET['action']=="emptyError"){
					$message = "You do not have any product in your basket!";
					echo "<script>alert('$message');</script>";
			}
?>

<div class="container">
	<div class="row">
		<div class="col-xl-9">
			<h2>Shopping Basket</h2>
			<table class="table table-striped table-bordered table-hover " >
				<thead style="border: 3px solid #b8a9c9;">
					<tr>
					<th scope="col"></th>
					<th scope="col">Product Name</th>
					<th scope="col">Price</th>
					</tr>
					
				</thead>
				<tbody id="myRows" style="color: #6C3483  ; font-size:medium; font-weight: bold;">
	  				<?php 
					  	$totalPrice=0;
						if(isset($_SESSION['basket'])){
							foreach($_SESSION['basket'] as $id => $value) {
								$totalPrice += $value["price"]; 
								echo '
								<tr>
									<td style="width:180px;">
										<a style="color: #6C3483" href="basket.php?action=delete&id='.$id.'">
											<i class="fal fa-trash-alt" style=" position: absolute; "></i>
										</a>
										<img class="ml-5" src="imgs/'.$value["img"].'" width="60px" height="60px" alt="">
									</td>
									<td>'.$value["name"].'</td>
									<td>'.$value["price"].'$</td>
								</tr>
								';
							}
						} 
					?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-secondary radius-25 ">Continue Shopping</a>
		</div>

		<div class="col-xl-3 ">
			<div class="card mt-5 ml-5" style="width: 18rem; background-color: #daebe8;" >
				<div class="card-body ">
					<h5 class="card-title">Order Details</h5>
					<hr>
					<p class="card-text priceColor " style="color: #E74C3C  ; font-size:medium; font-weight: bold;" id="total">
						Total Price: <?php echo $totalPrice;?>$
					</p>
					<!-- This php code for user who try to buy without log in and user that logged in but try to buy nothing -->
					<?php 
						if(isset($_SESSION["userId"])){
							if(empty($_SESSION["basket"])){
								echo '<a class="btn btn-block btn-secondary radius-25 card-link" href="basket.php?action=emptyError" >
												Buy
											</a> ';
							} else{
								echo '<button id="myBtn" class="btn btn-block btn-secondary radius-25 card-link" >
												Buy
											</button> ';
							}
							
						} else{
							echo '<a class="btn btn-block btn-secondary radius-25 card-link" href="basket.php?action=buyError" >
											Buy
										</a> ';
						}
					?>
					

				</div>
				</div>
		</div>
	</div>
</div>
<!-- ı use this form for orders and hidden input for getting order's total price -->
<div id="myModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<form method="post" action="basket.php">
		<div class="form-group" style="font-weight: bold;">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" name="address" placeholder="Address" >
		</div>
		<div class="form-group" style="font-weight: bold;">
			<label for="paymentMethod">Payment method</label>
			<select class="form-control"  id="paymentMethod" name="paymentMethod">
				<option selected  hidden value="">Select your payment method</option>
				<option class="optionColor" value="wire" >wire transfer</option>
				<option class="optionColor" value="credit" >credit card</option>
			</select>
		</div>
		<div class="form-group" style="font-weight: bold;">
			<label for="address">Card Number</label>
			<input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Card Number" >
		</div>
		<button type="submit" class="btn btn-secondary radius-25 ">Submit</button>
		<input type="hidden" name="totalPrice" value="<?php echo $totalPrice;?>">
		</form>
	</div>
</div>
<?php include "footer.php" ?>