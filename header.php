<?php
// session_start();
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
            <img src="./image/logo.jpg" alt="logo">
        </a>
        
        <div class="search-bar">
            <input id="search" type="text" placeholder="Search..">
            <input id="sbutton" type="button" value="Search">
        </div>

        <div class="profile-icon">
            <img src="./icon/user.png" alt="usericon" width="50px">
        </div>
    </div>

    <nav class="nav-bar">
        <a href="./home.php" class="nav-link">Home</a>
        <a href="" class="nav-link">Category</a>
        <a href="" class="nav-link">Contact</a>
        <a href="./AboutUS.php" class="nav-link">About</a>
    </nav>
</body>
</html>
