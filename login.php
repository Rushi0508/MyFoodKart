<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login_signup.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<title>Login | MyFoodKart</title>
</head>
<body>


	<div class="container">
		<form action="login.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" placeholder="Username" name="uname" required>
			</div>
			<div class="input-group">
				<input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" placeholder="Password" name="psw" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="signup.php">Sign Up Here</a>.</p>
		</form>
	</div>

</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'config.php';
    $username = $_POST["uname"];
    $password = $_POST["psw"]; 
    
    $sql = "Select * from users where username='$username'"; 
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['userid'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            setcookie("user", $row['username'], time() + (86400 * 30)); 
            setcookie("pass", $password, time() + (86400 * 30)); 
            header("location: /MyFoodKart/home_loggedin.php?loginsuccess=true");
            exit();
        } 
        else{
            $result = '<div style="position:absolute; bottom: 100px; color:red;">Wrong Password</div>';
            echo $result;
        }
    } 
    else{
      $result = '<div style="position:absolute; bottom: 100px; color:red;">Sign-Up First</div>';
      echo $result;
    }
}    
?>