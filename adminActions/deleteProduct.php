<?php 
    #we get options from admin.php
    #we get name of inputs :id from admin forms
    $id = $_POST["deleteProduct"];
    $sql = "DELETE FROM product WHERE id=$id";
    $result = $conn->query($sql);
    

    if(empty($id)) {
		$message = "Do not leave any empty input!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	} else{
        $message = "Choosen product has been deleted!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>