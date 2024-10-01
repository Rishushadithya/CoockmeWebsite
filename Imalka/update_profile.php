<?php

// Database connection
require 'myconfig.php';

if (isset($_POST["update"])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);
    }

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $mobile = $_POST["mobile"];
    $title = $_POST["title"];
    $bio = $_POST["bio"];
    $experience = $_POST["experience"];
    $currentWork = $_POST["currentWork"];

    $updateuser = "UPDATE user SET First_Name='$firstName', Last_Name='$lastName', Email='$email', Country='$country', Contact_Number='$mobile'";
    $updatecreator = "UPDATE creator SET Title='$title', Bio='$bio', Years_of_Experience='$experience', Current_Work='$currentWork', Profile_Picture='$imgContent'";
 
    if ($con->query($updateuser) === TRUE && $con->query($updatecreator) === TRUE) {
        header("Location: creator_profile.php");
        
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();

}

?>