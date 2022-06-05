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
}?>
<!DOCTYPE html>
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

  <h1>PUNJABI FOOD</h1>
  <div class="row">
    <!-- Fetch all the categories and use a loop to iterate through categories -->
    <div class="col">

      <div class="card" style="width: 18rem;">
        <img src="./images/panir masala.webp" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">PANEER MASALA</h5>
          <p class="card-text" style="color: red">Rs 120.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="10">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/IMG_7765.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">CHOLE KULCHE</h5>
          <p class="card-text" style="color: red">Rs 180.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="11">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/lassi2.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">SPECIAL LASSI</h5>
          <p class="card-text" style="color: red">Rs 50.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="12">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/paratha.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">ALOO PARATHA</h5>
          <p class="card-text" style="color: red">Rs 25.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="13">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/palak paneer.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">PALAK PANEER</h5>
          <p class="card-text" style="color: red">RS 160.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="14">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/malai kofta.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">MALAI KOFTA</h5>
          <p class="card-text" style="color: red"> RS 180.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="15">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/CHANA DAL.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">CHANA DAL</h5>
          <p class="card-text" style="color: red"> RS 150.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="16">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/Shahi-Paneer1.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">SHAHI PANNER</h5>
          <p class="card-text" style="color: red"> RS 200.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="17">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/dal makhani1.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">DAL MAKHANI</h5>
          <p class="card-text" style="color: red"> RS 190.00/-</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="18">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>





  </div>
  <script src="nav.js"></script>
</body>

</html>