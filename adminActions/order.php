<?php 
    #we get options from admin.php
    #we get name of inputs :id from admin forms
    $id = $_POST["cancelOrder"];
    $sql = "DELETE FROM order_product WHERE orderId=$id";
    $result = $conn->query($sql);
    $sql = "DELETE FROM orders WHERE id=$id";
    $result = $conn->query($sql);
    if(empty($id)) {
		$message = "Do not leave any empty input!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	} else{
        $message = "Choosen order has been canceled!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>