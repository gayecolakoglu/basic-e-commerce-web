<?php include "header.php" ?>


  <div class="container" >
    <div class="row" id="row1">
      <!-- Get product and return it in the index.php(home page),when click specific category,we call this php code in navbar category part  -->
      <?php 
      if(isset($_GET['category'])){
        $myCat = $_GET['category'];
        $sql = "SELECT * FROM product WHERE category ='$myCat'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $img = $row["img"];
            echo '
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 align-items-stretch d-flex"> 
            <div class="card box" style="width:16rem;">
              <img class="card-img-top" src="imgs/'.$img.'" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">'.$name.'</h5>
                <p class="card-text">'.$description.'...</p>
                <p class="card-text font-weight-bold priceColor" >'.$price.'$</p>
                <a  class="btn box " href="basket.php?action=add&id='.$row["id"].'"><i class="far fa-shopping-basket" id="basket" ></i></a>
              </div>
            </div>
          </div>
            ';
          }
        }
      } else if ($_SERVER["REQUEST_METHOD"] != "POST"){
        # if isset($_GET['category']) false and $_SERVER["REQUEST_METHOD"] != "POST" then we return our home page and product
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $img = $row["img"];
            echo '
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 align-items-stretch d-flex"> 
            <div class="card box" style="width:16rem;">
              <img class="card-img-top" src="imgs/'.$img.'" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">'.$name.'</h5>
                <p class="card-text">'.$description.'...</p>
                <p class="card-text font-weight-bold priceColor" >'.$price.'$</p>
                <a  class="btn box " href="basket.php?action=add&id='.$row["id"].'"><i class="far fa-shopping-basket" id="basket" ></i></a>
              </div>
            </div>
          </div>
            ';
          }
        }
      } else if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["isSearch"] == "1"){
          # this else if is for SearchInput, we have hidden input that name is =isSearch
          $searchValue = $_POST["searchInput"];
          $sql = "SELECT * FROM product WHERE name LIKE '%$searchValue%'";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $name = $row["name"];
              $description = $row["description"];
              $price = $row["price"];
              $img = $row["img"];
              echo '
              <div class="col-lg-3 col-md-6 col-sm-6 mb-3 align-items-stretch d-flex"> 
              <div class="card box" style="width:16rem;">
                <img class="card-img-top" src="imgs/'.$img.'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.$name.'</h5>
                  <p class="card-text">'.$description.'...</p>
                  <p class="card-text font-weight-bold priceColor" >'.$price.'$</p>
                  <a  class="btn box " href="basket.php?action=add&id='.$row["id"].'"><i class="far fa-shopping-basket" id="basket" ></i></a>
                </div>
              </div>
            </div>
              ';
            }
          }

      }
      ?>
         
    </div>
  </div>



  <?php include "footer.php" ?>

