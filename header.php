<!-- create my session -->
<?php 
  session_start(); 
	# we user clicked log out we destroy session and unset $_SESSION['userId']
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['userId']);
  	header("location: index.php");
  }
?>


<!DOCTYPE html>
<html lang="utf-8">
<head>

	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="modal.css">
		<link rel="stylesheet" href="Hw.css">

</head>
<!-- connect my database -->
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password, "website");
	// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	?>
	
	<!-- Iclude my navbar -->
  <?php include "navbar.php" ?>