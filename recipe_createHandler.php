<?php
require_once('config.php');

if (isset($_POST["submitBtn"])) {
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $tit = $_POST["title"];
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $descrip = $_POST["description"];
        $ingredi = $_POST["ingredients"];
        $method = $_POST["method"];
        $serv = $_POST["servings"];
        $ctime = $_POST["CTime"];
        $ptime = $_POST["PTime"];
        $cuisi = $_POST["cuisine"];
        $difficul = $_POST["difficulty"];
        $pending = "pending";
        
        $stmt = $con->prepare("INSERT INTO recipe (Recipe_Name,Image,Description,Ingredients,Method,Serves,Prepare_Time,Cook_Time,Cuisine,Difficulty,Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssissss",$tit, $imgContent, $descrip, $ingredi, $method, $serv, $ptime, $ctime, $cuisi, $difficul, $pending);
        
        if ($stmt->execute()) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "File upload failed.";
    }
}
?>
