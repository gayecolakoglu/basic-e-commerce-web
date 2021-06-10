<?php
    #we get name of inputs :updateProduct ,productName ,category ,price ,desc,img from admin forms
	$id=$_POST["updateProduct"];
    $name = $_POST["productName"];
	$desc = $_POST["desc"];
	$category = $_POST["category"];
	$price = $_POST["price"];
	$img = basename($_FILES['img']['name']);
    $arr = array("name"=>$name ,"description"=> $desc ,"category"=> $category, "price"=> $price);
    $flag = 0;
    #we can create arr with only values but at the update part in foreach we dont know what to write instead 
    #of key part efficiently so we use key->value
    foreach($arr as $key=>$value){
        if(!empty($value)){
            $sql = "UPDATE product SET $key ='$value' WHERE id=$id";
            $result = $conn->query($sql);
            $flag=1;
        }
    }

    if(!empty($img)){
        if(move_uploaded_file($_FILES['img']['tmp_name'], "imgs/".$img)){
            $sql = "UPDATE product SET img ='$img' WHERE id=$id";
            $result = $conn->query($sql);
            $flag=1;
        }
    }
	if($flag==1){
        $message = "Choosen product has been updated!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }	
?>