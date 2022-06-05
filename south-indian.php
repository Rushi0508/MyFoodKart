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

        <h1> SOUTH-INDIAN FOOD </h1>
        <div class="row">
            <!-- Fetch all the categories and use a loop to iterate through categories -->
            <div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/dosa.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">DOSA</h5>
                            <p class="card-text" style="color: red">Rs. 120/-</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="46">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/rava-dosa.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">RAVA-DOSA</h5>
                            <p class="card-text" style="color: red">Rs. 180/- </p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="47">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/maysore-dosa.webp" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">MAYSORE-DOSA</h5>
                            <p class="card-text" style="color: red">Rs. 150/- </p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="48">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/Idali.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">IDALI</h5>
                            <p class="card-text" style="color: red">Rs. 70/-</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="49">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/medu-vada.JPG" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">MEDU-VADA</h5>
                            <p class="card-text" style="color: red">Rs. 50/- </p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="50">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/uttapam.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">UTTAPAM</h5>
                            <p class="card-text" style="color: red">Rs. 70/- </p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="51">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                          </div>
                        </div>
                        </div><div class="col">
                      <div class="card" style="width: 18rem;">
                        <img src="./images/upma.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                          <h5 class="card-title" style="color:#007bff;">UPMA</h5>
                          <p class="card-text" style="color: red">Rs. 50/-</p>
                          <form action="_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="52">
                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                        </div>
                      </div>
                    </div><div class="col">
                      <div class="card" style="width: 18rem;">
                        <img src="./images/lemon-rice.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                          <h5 class="card-title" style="color:#007bff;">LEMON-RICE</h5>
                          <p class="card-text" style="color: red">Rs. 50/- </p>
                          <form action="_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="53">
                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                        </div>
                      </div>
                    </div><div class="col">
                      <div class="card" style="width: 18rem;">
                        <img src="./images/paper-dosa.webp" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                          <h5 class="card-title" style="color:#007bff;">PAPER-DOSA</h5>
                          <p class="card-text" style="color: red">Rs. 100/- </p>
                          <form action="_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="54">
                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button></form>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>  
                    </div>
        </div>
        <script src="nav.js"></script>
    </body>
</html>