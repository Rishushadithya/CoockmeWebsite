<?php

require 'myconfig.php';

$sql = "SELECT * FROM user WHERE User_ID = 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $fname = $row["First_Name"];
        $lname = $row["Last_Name"];
        $email = $row["Email"];
        $country = $row["Country"];
        $mobile = $row["Contact_Number"];
    }
} else {
    echo "0 results";
}


$sql = "SELECT * FROM creator";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $title = $row["Title"];
        $bio = $row["Bio"];
        $work = $row["Current_Work"];
        $experience = $row["Years_of_Experience"];
        $propic = '<img src="data:image/jpeg;base64,' . base64_encode($row['Profile_Image']) . '" alt="Profile Picture">';
    }
} else {
    echo "0 results";
}

$con->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/creator_profile.css">
</head>

<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>
    <br><br>
    <h1>Profile</h1>

    <div class="profile-container">
        <form id="profileForm" action="update_profile.php" method="post" enctype="multipart/form-data">
            <div class="profile-picture">
                Profile Picture <br><br>
                <?php echo $propic; ?>
                <input type="file" id="profileImageInput" name="image" accept="image/*">
            </div>
            <div class="profile-details">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo  $fname; ?>">
                
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $lname; ?>">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                
                <label for="country">Country:</label>
                <input type="text" id="country" name="country" value="<?php echo $country; ?>">
                
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                
                <label for="title">Title:</label>
                <select id="title" name="title" value="">
                    <option value=""><?php echo $title; ?>  (Current Title)</option>
                    <option value="Chef">Chef</option>
                    <option value="Baker">Baker</option>
                    <option value="Culinary Expert">Culinary Expert</option>
                </select>
                
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" value=""><?php echo $bio; ?></textarea>
                
                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="experience" value="<?php echo $experience; ?>">
                
                <label for="currentWork">Current Work:</label>
                <input type="text" id="currentWork" name="currentWork" value="<?php echo $work; ?>">
                
                <button type="submit" name="update">Update</button>
            </div>
        </form>
    </div>
    
    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>