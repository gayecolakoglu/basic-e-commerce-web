<?php
	#we get name of inputs :productName ,desc ,category ,price ,img from admin forms
	$name = $_POST["productName"];
	$desc = $_POST["desc"];
	$category = $_POST["category"];
	$price = $_POST["price"];
	$img = basename($_FILES['img']['name']);
    
	if(empty($name) || empty($desc) || empty($category) || empty($price) || empty($img) ) {
		$message = "Do not leave any empty input!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}else{
		if(move_uploaded_file($_FILES['img']['tmp_name'], "imgs/".$img)){
			#moves uploded file into imgs 
            $sql = "INSERT INTO product (img, name, description, price,category) VALUES ('$img', '$name', '$desc', '$price','$category')";
            $result = $conn->query($sql);
            $message = "New product has been created";
		    echo "<script type='text/javascript'>alert('$message');</script>";
        } else{
			$message = "There is an error , files could not uploaded";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>