

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        input {
            width: 50%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #new {
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
    <h2>Password Reset</h2>

    <!-- Email Check Form -->

    <form id="email-form" method="post">
        <label for="email">Enter your email to reset your password:</label>
        <input type="email" name="email" required><br>
        <input id="new" type="submit" name="submit" value="submit">
    </form>
    <?php
    require "cookmeconnect.php";
    $fake_email=$_POST["email"]??'';
     
    if(isset($_POST["submit"]))
    {
  
    $sql = "SELECT Email FROM user ";
    $result = $cook->query($sql); 
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
           
            $true_email=$row["Email"];
            if($true_email==$fake_email)
            {
                
                header("location: reset password.php?");

            }
         
        }
    } 
    else 
    {
        echo "0 results";
    }
    }

    $cook->close();
    ?>

    <br><br>
    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>
