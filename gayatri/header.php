<?php
require('config.php');
$_SESSION['userid']=2;
$_SESSION['cp']="chinese";
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
        
        <div class="search-bar">
            <input id="search" type="text" placeholder="Search..">
            <button type="submit" id="searchbutton"><i class="fa fa-search"></i></button>
        </div>

        <div class= "user-name" ><?php
            echo $_SESSION ['name'];
            ?> </div>
        <div class="user-menu">
                <img src="./icon/user.png" alt="User Icon" class="user-icon" onclick="toggleDropdown()">
                <div class="dropdown">
                    <a href="profile.php">Account</a>
                    <a href="logout.php">Logout</a>
                </div>	
            </div>
    </div>

    <nav class="nav-bar">
        <a href="./home.php" class="nav-link">Home</a>
        <a href="./category.php" class="nav-link">Category</a>
        <a href="./contactUs.php" class="nav-link">Contact Us</a>
        <a href="./privacyPolicy.php.php" class="nav-link">Privacy Policy</a>
        <a href="./AboutUS.php" class="nav-link">About Us</a>
        <a href="./terms.php.php" class="nav-link">Terms and Condition</a>
    </nav>
    <script src="./JS/header.js"></script>
</body>
</html>
