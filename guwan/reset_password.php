<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="forget password.css">
    <style>
    input {
    width: 50%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
     }
    #new{
    width: 10%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
     }
</style>  

</head>

<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>
<script>
        alert("Use a minimum of 8 characters and create a complex password for your own safety.");
</script>

    <h2>Password Reset</h2>
    <form id="reset-form" method="post">
      <label for="newpassword">Enter new password:</label>
      <input type="password" name="newpassword" required><br>

      <label for="confirm-password">Confirm new password:</label>
      <input type="password" name="confirmpassword" required><br>

      <input id="new" type="submit"  value="update" name="update"><br>

    </form>
  

<?php
// Database connection
require 'config.php';


if (isset($_POST["update"])) {
    
    $newPassword = $_POST["newpassword"];
    $confirmPassword = $_POST["confirmpassword"];
    if(strlen($newPassword)>= 8)
    {
        if($confirmPassword==$newPassword)
        {
        
            session_start();
            $fake_email=$_SESSION['email'];

        $sql="UPDATE user SET  Password='$newPassword' WHERE Email='$fake_email'";
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


}
$con->close();

?>



    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>


