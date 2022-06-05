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
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | MyFoodKart</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="phone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
</head>

<style>
    body{
        background-color: #ffedd4;
    }
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

    table {
        margin-left: 30px;
        font-family: 'Quicksand';
    }
    table button{
        font-family: 'Quicksand';
    }

    table,
    th,
    td {
        border: 3px solid rgb(255, 255, 255);
        border-collapse: collapse;
    }

    th,
    td {
        padding: 7px 8px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #F1E1A6;
    }

    tr:nth-child(odd) {
        background-color: #F4BBBB;
    }

    thead tr th {
        background-color: #a6d0df;
    }
    .container{
        display: flex;
    }
    .hello{
        line-height: 40px;
    }
    h1{
        font-family: 'Quicksand';
    font-weight: bolder;
    text-align: center;
    }
    li{
        list-style: none;
    }
    .order-container{
        font-family: 'Quicksand';
        position: absolute;
        right: 100px;
        margin-left:600px;
        line-height: 20px;
    }
    .order-container ul{
        line-height: 40px;
    }
    .checkout-btn{
        font-family: 'Quicksand';
        font-weight: 650;
        border: 1px solid green;
        background-color: white;
        color: green;
        padding: 5px 5px;
        border-radius: 5px;
    }
    .checkout-btn:hover{
        background-color: green;
        color: white;
    }
    td button, .rmall-btn{
        background-color: white;
        color: #dc3545;;
        border: 1px solid red;
        font-weight: 650;
        border-radius: 5px;
        padding: 5px 5px;
    }
    td button:hover, .rmall-btn:hover{
        background-color: #dc3545;;
        color: white;
    }
    
    @media  screen and (min-width:1200px) {
        table{
            width: 50%;
        }
    }
    @media  screen and (min-width:1400px) {
        table{
            width: 55%;
        }
    }
    @media  screen and (max-width:1130px) {
        table{
            margin: auto;
            width: 80%;
        }
        .container{
            display: block;
        }
        .order-container{
            display: flex;
            flex-direction: column;
            align-items: center;
            position: static;
           margin-left: 0px;
           margin: 5% 0px;
        }
        hr{
            background-color: #e74a4a;
            z-index: 7;
            width: 58%;
        }
    }
    @media screen and (max-width:600px) {
        .remove{
            padding-left: 0px;
            padding-right: 0px;
        }
        table thead{
            display: none;
        }
        table, table  tbody, table tr, table td{
            display: block;
            width:100%;

        }
        td{
            padding: 7px 12px;
        }
        table tbody tr td{
            text-align:right;
            padding-left:50%;
            position:relative;
        }
        .table tr{
            margin-bottom: 5px; 
        }
        table td:before{
            content:attr(data-label);
            position:absolute;
            left:0;
            width:40%;
            padding-left:15px;
            font-weight:600;
            text-align:left;
        }
        table{
            width: 80%;
        }
        .remove{
            display: flex;
            justify-content: center;
        }
        .order-container{
            font-size: 11px;
            margin-top: 10%;
        }
        hr{
            background-color: #e74a4a;
            z-index: 7;
            width: 58%;
        }
} 
@media screen and (min-width:2000px) {
    .order-container{
        right: 200px;
        font-size: 25px;
    }
    .order-container ul, .hello {
        line-height: 60px;
    }
}
    
</style>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
        $userId = $_SESSION['userId'];
        $username = $_SESSION['username'];
    } else {
        $loggedin = false;
        $userId = 0;
    }
    ?>


    <?php
    if ($loggedin) {
    ?>


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

        <h1>My Cart</h1><br><hr width="84%" style="margin: auto;"><br>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <form action="_manageCart.php" method="POST">

                                <button name="removeAllItem" class="rmall-btn">Remove All</button>
                                <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId'];
                                                                            echo $userId ?>">
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `viewcart` WHERE `userId`= $userId";
                    $result = mysqli_query($link, $sql);
                    $counter = 0;
                    $totalPrice = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $itemId = $row['itemId'];
                        $Quantity = $row['itemQuantity'];
                        $mysql = "SELECT * FROM `item` WHERE itemId = $itemId";
                        $myresult = mysqli_query($link, $mysql);
                        $myrow = mysqli_fetch_assoc($myresult);
                        $itemName = $myrow['itemName'];
                        $itemPrice = $myrow['itemPrice'];
                        $total = $itemPrice * $Quantity;
                        $counter++;
                        $totalPrice = $totalPrice + $total;

                        echo '<tr>
                                            <td data-label="No.">' . $counter . '</td>
                                            <td data-label="Item Name">' . $itemName . '</td>
                                            <td data-label="Item Price">' . $itemPrice . '</td>
                                            <td data-label="Quantity">
                                                <form id="frm' . $itemId . '">
                                                    <input type="hidden" name="itemId" value="' . $itemId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" onchange="updateCart(' . $itemId . ')" onkeyup="return false" style="width: 50px; border: 1px solid white; border-radius: 5px; padding: 4px 4px" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td data-label="Total Price">' . $total . '</td>
                                            <center><td class="remove">
                                                <form action="_manageCart.php" method="POST">
                                                    <button name="removeItem" >Remove</button>
                                                    <input type="hidden" name="itemId" value="' . $itemId . '">
                                
                                                    
                                                </form>
                                            </td></center>
                                        </tr>';
                    }
                    // if($counter==0) {
                    //     
                    ?><script>
                        document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';
                    </script> 
                </tbody>
            </table>
        <div class="order-container">
            <h2>Order summary</h2><br><hr><br>
            <ul>
                <li>Total Price = Rs. <?php echo $totalPrice ?>/-</li>
                <li>Shipping Charges = Rs. 0/-</li>
                <li>
                    <strong>Grand Total (including tax & shipping charges) = 
                    Rs. <?php echo $totalPrice ?>/-</strong>
                </li>
            </ul>
            <div class="hello">
                <input type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                <label for="flexRadioDefault1">
                    Cash On Delivery
                </label>
                <input type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                <label for="flexRadioDefault1">
                    Online Payment
                </label>
                <p class="disabled">(Online Payments are temporarily Disabled)</p>
                <?php $_SESSION['amount'] = $totalPrice?>
                <div>
                <a href="checkout.php"><button type="button" data-toggle="modal" data-target="#checkoutModal" class="checkout-btn">Go to Checkout</button></a>
                </div>
            </div>

        </div>
        </div>
        

    <?php
    } else {
        echo '<font style="font-size:25px"><center><p> To see your Cart kindly <a href = "login.php" style="color:blue;">Login</a> first</p><center></font>';
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }

        function updateCart(id) {
            $.ajax({
                url: '_manageCart.php',
                type: 'POST',
                data: $("#frm" + id).serialize(),
                success: function(res) {
                    location.reload();
                }
            })
        }
    </script>
   
<script src="nav.js"></script>
</body>

</html>