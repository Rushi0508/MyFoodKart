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
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders | MyFoodKart</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Your Order</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="phone.css">
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
        justify-content: center;
        align-items: center;
    }
    h1{
        font-family: 'Quicksand';
    font-weight: bolder;
    text-align: center;
    }
    hr{
        width: 40%;
        margin: auto;
        border: 2px solid;
    }
    #print-btn{
        font-family: 'Quicksand';
        font-weight: 700;
        border: 1px solid green;
        background-color: white;
        color: green;
        padding: 5px 8px;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }
    #print-btn:hover{
        background-color: green;
        color: white;
    }
    @media screen and (max-width:800px) {
        table{
            width: 75%;
            margin: auto;
        }
    }
    @media screen and (max-width:560px) {
        .table thead{
            display: none;
        }
        .table, .table  tbody, .table tr, .table td{
            display: block;
            width:100%;

        }
        td{
            padding: 7px 12px;
        }
        .table tbody tr td{
            text-align:right;
            padding-left:50%;
            position:relative;
        }
        .table tr{
            margin-bottom: 5px; 
           
        }
        .table td:before{
            content:attr(data-label);
            position:absolute;
            left:0;
            width:40%;
            padding-left:15px;
            font-weight:600;
            text-align:left;
        }
        .table-wrapper{
            width: 80%;
        }
    }
    </style>

</head>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
        $userId = $_SESSION['userId'];
        $username = $_SESSION['username'];
    } else {
        $loggedin = false;
        $userId = 0;
    } ?>
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
    </nav><br>

        
        <div class="container">
            <div class="table-wrapper" id="empty">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                        <h1>Your Orders</h1><br><hr><br>
                        </div>
                        <div class="col-sm-8">
                            <center><a href="#" onclick="window.print()" class="btn btn-info"><button id="print-btn"><i class="material-icons">&#xE24D;</i><p>Print</p></button></a></center>
                        </div><br>
                    </div>
                </div>
                
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Amount</th>
                            <th>Payment Mode</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `orders` WHERE `userId`= $userId";
                        $result = mysqli_query($link, $sql);
                        $counter = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $orderId = $row['orderId'];
                            $address = $row['address'];
                            $zipCode = $row['zipCode'];
                            $phoneNo = $row['phoneNo'];
                            $amount = $row['amount'];
                            $orderDate = $row['orderDate'];
                            $paymentMode = $row['paymentMode'];
                            if ($paymentMode == 0) {
                                $paymentMode = "Cash on Delivery";
                            } else {
                                $paymentMode = "Online";
                            }
                            $orderStatus = $row['orderStatus'];

                            $counter++;

                            echo '<tr>
                                    <td data-label="Order Id">' . $orderId . '</td>
                                    <td  data-label="Address">' . substr($address, 0, 20) . '...</td>
                                    <td  data-label="Phone No">' . $phoneNo . '</td>
                                    <td  data-label="Amount"> Rs. ' . $amount . '</td>
                                    <td  data-label="Payment Mode">' . $paymentMode . '</td>
                                    <td  data-label="Order Date">' . $orderDate . '</td>
                                </tr>';
                        }

                        if ($counter == 0) {
                        ?><script>
                                document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5" style="line-height:50px;"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h2><strong>You have not ordered any items.</strong></h2><strong><h2>Click below to:<h2></strong> <a href="menu.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a> </div></div></div></div>';
                            </script> <?php
                                    }
                                        ?>
                    </tbody>
                </table><br><br>
            </div>
        </div>
        <!-- <footer>
            Copyright &#169; Insider Coders 2022 | All Rights Reserved.
        </footer> -->

    <?php
    } else {
        echo '<font style="font-size:22px"><center><p> To see your orders kindly <a href = "login.php" style="color:blue;">Login</a> first</p><center></font>';
    }
    ?>
    <?php
    // include '_orderItemModal.php';
    // include '_orderStatusModal.php';
    ?>
    <!--  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="nav.js"></script>
</body>

</html>