<?php

// Database connection
require 'config.php';

if (isset($_POST["update"])) {
    $mid=$_POST['Mid']??'';
    $mname = $_POST["moderator_Name"];
    $email = $_POST["email"];
  
    if(empty($mname)||empty($email)){

        echo"All required";
    }
    else{
      $sql="UPDATE moderator SET Moderator_Name='$mname', Email='$email'WHERE Moderator_ID='Mid'";
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


