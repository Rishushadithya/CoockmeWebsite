<?php

// Check if submit button pressed
if (isset($_POST["submitBtn"])) {
    $titel = $_POST["title"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $method = $_POST["method"];
    $servings = $_POST["servings"];
    $cookingTime = $_POST["cookingTime"];
    $cuisine = $_POST["cuisine"];
    $difficulty = $_POST["difficulty"];
    

    $sql=


    // Execute INSERT query
    if (mysqli_query($con, "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')")) {
        echo "Record inserted successfully";
    }
}
?>