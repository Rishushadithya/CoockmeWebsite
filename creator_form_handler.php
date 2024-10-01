<?php

// Database connection
require 'config.php';

if (isset($_POST["submit"])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);

        // Get form data
        $userid=4;
        $email=$_POST['email'];
        $pass1=$_POST['password'];
        $title=$_POST['title'];
        $bio=$_POST['bio'];
        $experience=$_POST['experience'];
        $work=$_POST['currentWork'];

        // Check if user ID already exists in creator table
        $sql = "SELECT User_ID FROM creator WHERE User_ID='$userid'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo "<script>alert('User ID already exists in creator table');</script>";
        }else{

            // Validate email and password
            $sql="SELECT * FROM user WHERE Email='$email'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                if ($pass1== $row['Password']) { 

                    // Email and password are correct, proceed to store other details
                    $abc="SELECT User_ID FROM user WHERE Email='$email' AND Password='$pass1'";
                    $result = $con->query($abc);

                    while($row = $result->fetch_assoc()) {
                        $userId = $row['User_ID'];                    
                    }

                    $stmt = $con->prepare("INSERT INTO creator (User_ID, Title, Bio, Current_Work, Years_of_Experience, Profile_Image) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("isssis", $userId, $title, $bio, $work, $experience, $imgContent);
                        
                    if ($stmt->execute()) {
                        echo "<script>alert('Form submitted successfully!');</script>";
                    } else {
                        echo "<script>alert('Error! ".$stmt->error."');</script>";
                    }
                        
                    $stmt->close();

                } else {
                    echo "<script>alert('Invalid password');</script>";
                }

            } else {
                echo "<script>alert('No user found with that email');</script>";
            }
        }

    }
}

?>