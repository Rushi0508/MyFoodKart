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
}?><!doctype html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | MyFoodKart</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="phone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
</head>
<style>
    span {
        font-family: 'Quicksand';
        color: #02ff02;
        margin-left: 10px;
    }

    #logout {
        padding: 3px 10px;
        font-family: 'Baloo Bhai 2', sans-serif;
        margin-left: 10px;
    }
    #checkoutModal div{
        align-items: center;
        justify-content: center;
        display: flex;
    }
    #checkoutModal h2{
        text-align: center;
    }
    input{
        width: 80%;
        margin-left: 44px;
        /* justify-content: center; */
        /* display: flex; */
        border: 2px solid rgba(0, 0, 0, 0);
        outline: none;
        background-color: rgba(230, 230, 230, 0.6);
        padding: 10px 10px;
        font-size: 1.1rem;
        margin-bottom: 5px;
        transition: .3s;
        font-family: 'Quicksand';
    }
    input:hover{
        background-color: rgba(0, 0, 0, 0.1);
    }
    #checkoutModal{
        height: 440px;
        width: 440px;
        margin: auto;
        background-color: #fff;
	    box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
        font-family: 'Quicksand';
    }
    #checkoutModal::after{
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: url('./images/contact_bg1.jpg') no-repeat center;
	background-size: cover;
	filter: blur(50px);
	z-index: -1;
}
.last-btns{
    font-family: 'Quicksand';
    padding: 10px 20px;
    text-align: center;
    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 30px;
    font-size: 1rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
    margin-left: 10px;
    margin-top: 10px;
}
.last-btns:hover{
    transform: translateY(-5px);
    background: #6c5ce7;
}
input:focus{
    border: 2px solid rgba(30,85,250,0.47);
    background-color: #fff;
}
@media screen and (max-width:500px) {
    #checkoutModal{
        width: 400px;
        margin: 15% auto;
    }
}
@media screen and (max-width:450px) {
    #checkoutModal{
        width: 360px;
        margin: 15% auto;
    }
}
@media screen and (max-width:400px) {
    #checkoutModal{
        width: 340px;
        margin: 15% auto;
    }
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

    <!-- Checkout Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
        <br><h2>Before Confirming Your Order</h2>
        <h2>Enter Your Details:</h2><br><hr><br>
        <div>
            <form action="_manageCart.php" method="post">
                <!-- <b><label for="address">Address:</label></b> -->
                <input id="address" name="address" placeholder="Address Line 1" type="text" required minlength="3" maxlength="500">
                <!-- <b><label for="address1">Address Line 2:</label></b> -->
                <input id="address1" name="address1" placeholder="Address Line 2" type="text">
                <!-- <b><label for="phone">Phone No:</label></b> -->
                <input type="tel" id="phone" name="phone" placeholder="Mobile Number" required pattern="[0-9]{10}" maxlength="10">
                <!-- <b><label for="zipcode">Pin Code:</label></b> -->
                <input type="text" id="zipcode" name="zipcode" placeholder="Pin Code" required pattern="[0-9]{6}" maxlength="6">
                <!-- <b><label for="password">Password:</label></b> -->
                <input id="password" name="password" placeholder="Password" type="password" required data-toggle="password">
                <div class="btns">
                    <a href="viewcart.php"><button type="button" data-dismiss="modal" class="last-btns">Cancel Order</button></a>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="last-btns">Confirm Order</button>
                </div>
             </form>
        </div>
</div>
        <script src="nav.js"></script>
</body>

</html>