<?php 
include 'config.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
$countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
$countresult = mysqli_query($link, $countsql);
$countrow = mysqli_fetch_assoc($countresult);      
$count = $countrow['SUM(`itemQuantity`)'];
if(!$count) {
  $count = 0;
}?><!DOCTYPE html>
<html>
    <head>
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Menu | MyFoodKart </title>
            <link rel="stylesheet" href="menu.css">
            <link rel="stylesheet" href="home.css">
            <link rel="stylesheet" href="phone.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
        </head>
    </head>
    <style>
    span{
      font-family: 'Quicksand';
        color: #02ff02;
        margin-left: 10px;
    }
    #logout{
    padding: 3px 10px;
    font-family: 'Baloo Bhai 2' , sans-serif;
    margin-left: 10px;
    }
    </style>
    <body>

    <nav class="navbar h-nav">
        <div class="title v-class" class="v-class">
            <h2>MyFoodKart</h2>
        </div>
        <ul class="nav-list v-class" class="v-class">
            <li><a href="home_loggedin.php">Home</a></li>
            <li><a href="menu.php">Categories</a></li>
            <li><a href="viewOrder.php">Your Orders</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="contact.php">Contact us</a></li>
        </ul>
        <div class="buttons v-class" class="v-class">
            <a href="viewCart.php"><button id="cart">
                <img src="./images/cart.png" alt="">
                <p>Cart(<?php echo $count ?>)</p>
            </button></a>
            <?php 
            $user_display = $_SESSION['username'];
            echo "<span>Welcome, $user_display</span>";
            ?> 
            <a href="_logout.php"><button id="logout" >Log Out</button></a>
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
<br>

  <h1> GUJARATI FOOD </h1>
  <div class="row">
    <!-- Fetch all the categories and use a loop to iterate through categories -->
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/sabzi.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">MIX VEG.</h5>
          <p class="card-text" style="color: red">Rs. 120/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="1">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/phulka.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">PULKA</h5>
          <p class="card-text" style="color: red">Rs. 20/- </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="2">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/dal-chaval.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">DAL-BHAT</a></h5>
          <p class="card-text" style="color: red">Rs. 50/- </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="3">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/Shrikhand.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">SHRIKHAND</h5>
          <p class="card-text" style="color: red">Rs. 50/-(per cup)</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="4">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/ras.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">RAS</h5>
          <p class="card-text" style="color: red">Rs. 40/-(per cup) </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="5">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/bhajiya.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">BHAJIYA</h5>
          <p class="card-text" style="color: red">Rs. 60/- </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="6">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/khandvi.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">KHANDVI</h5>
          <p class="card-text" style="color: red">Rs. 60/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="7">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/khamal.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">KHAMAL-DHOKLA</h5>
          <p class="card-text" style="color: red">Rs. 70/- </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="8">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/patra.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">PATRA</a></h5>
          <p class="card-text" style="color: red">Rs. 60/- </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="9">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
    <script src="nav.js"></script>
</body>

</html>