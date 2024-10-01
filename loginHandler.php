<?php
// Include database configuration

include 'config.php'; 
session_start();
if (isset($_POST['login'])) {

    $username = $_POST['email'];
    $password = $_POST['password'];

    $sql_admin = "SELECT * FROM admin WHERE Email='$username' AND Password='$password'";
    $result_admin = $con->query($sql_admin);

    $sql_moderator = "SELECT * FROM moderator WHERE Email='$username' AND Password='$password'";
    $result_moderator = $con->query($sql_moderator);

    $sql_user = "SELECT * FROM user WHERE Email='$username' AND Password='$password'";
    $result_user = $con->query($sql_user);


    if ($result_admin->num_rows > 0) {
        $_SESSION['id'] = $ROW ['Admin_ID'];
        $_SESSION['table'] = 'admin';
        $_SESSION['name'] = $ROW ['Admin_Name'];
        header("Location: home.php");
        exit();
    }
    else if ($result_moderator->num_rows > 0) {    
        $_SESSION['id'] = $ROW ['Moderator_ID'];
        $_SESSION['table'] = 'moderator';
        $_SESSION['name'] = $ROW ['Moderator_Name']; 
        header("Location: home.php");
        exit();
    }
    else if ($result_user->num_rows > 0) {
       
       
        $creatorid=$row["User_ID"];
        $sql_creator= "SELECT * FROM creator WHERE User_ID = '$creatorid'";
        $result_creator = $con->query($sql_creator);
        
        if ($result_creator->num_rows > 0) {    
            $_SESSION['id'] = $ROW ['Moderator_ID'];
            $_SESSION['table'] = 'creator';
            $_SESSION['name'] = $ROW ['Fist_Name']. $ROW ['Larst_Name'];
            header("Location: creator_dashboard.php");
            exit();
        }else{
            $_SESSION['id'] = $ROW ['User_ID'];
            $_SESSION['table'] = 'user';
            $_SESSION['name'] = $ROW ['Fist_Name']. $ROW ['Larst_Name'];
            header("Location: home.php");
            exit();
        }
       
    }   else {    
        echo "<script>alert('Invalid username or password.')</script>";
        echo "<script>window.open('login_index.php','_self')</script>";
    
        exit();
         }

}
else{
    echo "No data submitted.";
}
?>
