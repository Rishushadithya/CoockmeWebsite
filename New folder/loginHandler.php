<?php
// Include database configuration
include 'config.php'; // Assuming this file contains your DB connection

session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check in User table
    $user_query = "SELECT * FROM user WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($user_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['role'] = 'user';
        $_SESSION['user_id'] = $user['id'];
        header("Location: user_dashboard.php");
        exit();
    }

    // Check in Admin table
    $admin_query = "SELECT * FROM admin WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($admin_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['role'] = 'admin';
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: admin_dashboard.php");
        exit();
    }

    // Check in Moderator table
    $moderator_query = "SELECT * FROM moderator WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($moderator_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $moderator = $result->fetch_assoc();

    if ($moderator && password_verify($password, $moderator['password'])) {
        $_SESSION['role'] = 'moderator';
        $_SESSION['moderator_id'] = $moderator['id'];
        header("Location: moderator_dashboard.php");
        exit();
    }

    // Check in Creator table
    $creator_query = "SELECT * FROM creator WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($creator_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $creator = $result->fetch_assoc();

    if ($creator && password_verify($password, $creator['password'])) {
        $_SESSION['role'] = 'creator';
        $_SESSION['creator_id'] = $creator['id'];
        header("Location: creator_dashboard.php");
        exit();
    }

    // If no role matches, show an error
    echo "Invalid email or password";
}
?>
