<nav class="navbar navbar-expand-lg navbar-dark" id="myNavBar">
	  <a class="navbar-brand font-weight-bold " style="color: #154360; font-size: x-large;" href="index.php">Welcome</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 ml-auto " method="post" action="index.php">
	  	  <input type="hidden" name="isSearch" value="1">
	      <input class="form-control mr-sm-2" name="searchInput" type="search" placeholder="Search" aria-label="Search"  id="searchBar">
	      <button class="btn btn-secondary  my-2 my-sm-0 " type="submit">Search</button>
	    </form>
	    <ul class="navbar-nav ml-auto ">
        <li class="nav-item dropdown  pr-2 ">
	        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="far fa-user "style="font-size: 2rem; color:  #622569;"></i>
					
	        </a>
	        <div class="dropdown-menu btn-secondary myDropdownColor  " aria-labelledby="navbarDropdown">
						<?php
							if(isset($_SESSION["userId"])){
								$sql = "SELECT * FROM user WHERE id=".$_SESSION["userId"];
								$result = $conn->query($sql);
								$user = $result->fetch_assoc();
								if($user["admin"]==1){
									echo '<a class="dropdown-item" href="admin.php">Admin</a>';
								}
								#we used index.php at href part actually we wanna go headr.php taht is in the index.php
								echo '<a class="dropdown-item" href="account.php">Account</a>
											<a class="dropdown-item" href="index.php?logout="1"">Log out</a>
										';
							} else{
									echo '<a class="dropdown-item" href="login.php">Log in</a>
									<a class="dropdown-item" href="signup.php">Sign up</a>';
							}
						?>
						
          </div>
	      </li>
				<li class="nav-item" >
	        <a class="nav-link active" href="basket.php"><i class="far fa-shopping-basket "id="basket"></i></a>
	      </li>
	    </ul>
	  </div>
</nav>
<!-- Container for category part  -->
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#daebe8;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup1" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup1">
		<div class="navbar-nav px-4">
			<a class="nav-item nav-link" href="index.php?category=shampoo">Shampoo</a>
		</div>
		<div class="navbar-nav px-5">
			<a class="nav-item nav-link" href="index.php?category=bodylotion">Body Lotion</a>
		</div>
		<div class="navbar-nav px-5">
			<a class="nav-item nav-link" href="index.php?category=deodorant">Deodorant</a>
		</div>
		<div class="navbar-nav px-5">
			<a class="nav-item nav-link" href="index.php?category=suntancream">Suntan Cream</a>
		</div>
		<div class="navbar-nav px-5">
			<a class="nav-item nav-link" href="index.php?category=toothpaste">Toothpaste</a>
		</div>
		<div class="navbar-nav ">
			<a class="nav-item nav-link" href="index.php?category=toothbrush">Toothbrush</a>
		</div>
	</div>
	</nav>
</div>

