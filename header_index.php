<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/header.css">
    
    <title>header</title>

</head>
<body>

    <div class="header">
        <a href="home.php" class="logo">
            <img src="./icon/logo2.gif" alt="logo">
        </a>
        
        <div class="user-menu">
                <img src="./icon/user.png" alt="User Icon" class="user-icon" onclick="toggleDropdown()">
                <div class="dropdown">
                    <a href="login_index.php">Login</a>
                    <a href="registationform.php">Sing Up</a>
                </div>	
            </div> 
    </div>

    <nav class="nav-bar">
        <a href="#" class="nav-link">Home</a>
        <a href="" class="nav-link">Category</a>
        <a href="" class="nav-link">Contact Us</a>
        <a href="" class="nav-link">Privacy Policy</a>
        <a href="" class="nav-link">About Us</a>
        <a href="" class="nav-link">Terms and Condition</a>
    </nav>
    <script src="./JS/header.js"></script>
</body>
</html>
