<?php

// Database connection
require 'config.php';

if (isset($_POST["update"])) {
    $userid=$_POST["userid"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $mobile = $_POST["mobile"];
  
    if(empty($firstName)||empty( $lastName)||empty($email)||empty($country)||empty($mobile)){

        echo"All required";
    }
    else{
      $sql="UPDATE user SET First_Name='$firstName', Last_Name='$lastName', Email='$email', Country='$country', Contact_Number='$mobile' Where User_ID='$userid' ";
        if($con->query($sql))
        {
            echo"<h1>Successfully Updated<h1>";
        }
        else
        {
            echo"not Updated";
        }

    }



}
$con->close();

?>


