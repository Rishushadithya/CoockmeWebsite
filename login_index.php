<?php
include('config.php');
session_start();
error_reporting(0);

$username = $_POST['email'];
$password = $_POST['password'];

$sql_admin = "SELECT * FROM admin WHERE email='$username' AND password='$password'";
$result_admin = $conn->query($sql_admin);

$sql_moderator = "SELECT * FROM moderator WHERE email='$username' AND password='$password'";
$result_moderator = $conn->query($sql_moderator);


$sql_creatorCheck = "SELECT * FROM user WHERE email='$username' AND password='$password' ";
$creatorid=$row["User_ID "];
$sql_creator= "SELECT * FROM creator WHERE User_ID = '$creatorid'";
$result_creator = $conn->query($sql_creator);


$sql_user = "SELECT * FROM user WHERE email='$username' AND password='$password'";
$result_user = $conn->query($sql_user);


if ($result_admin->num_rows > 0) {
    $_SESSION['id'] = $ROW ['Admin_ID'];
    $_SESSION['table'] = 'admin';

    header("Location: admin_dashboard.php");
   
    exit();
}

else if ($result_moderator->num_rows > 0) {    
    $_SESSION['id'] = $ROW ['Moderator_ID'];
    $_SESSION['table'] = 'moderator';

    header("Location: user_dashboard.php");
    exit();
}

else if ($result_creator->num_rows > 0) {    
  $_SESSION['id'] = $ROW ['Moderator_ID'];
  $_SESSION['table'] = 'creator';
  
  header("Location: user_dashboard.php");
  exit();
}

else if ($result_user->num_rows > 0) {
    $_SESSION['id'] = $ROW ['User_ID'];
    $_SESSION['table'] = 'user';

    header("Location: user_dashboard.php");
    exit();
}

else {
    echo "Invalid username or password.";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to Cook Me</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./CSS/login.css">
  
 
</head>
<body>


  <div class="login-container">
    <form id="loginForm" action="" method="post">
      <h2>Login to Cook Me</h2>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password">
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="remember-me" name="remember-me">
        <label for="remember-me">Remember me</label>
      </div>
      <button type="submit" name="login">Log in</button>
      <a href="/forgot-password">Forgot your password?</a>
      <span>Not a Member ?<a href="/login"> Click here to Register </a></span>
    </form>
  </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./JS/login.js"></script>
</html>
