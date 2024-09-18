<?php
require 'config.php';

$Fname=$_POST["fname"];
$Sname=$_POST["sname"];
$Email=$_POST["email"];
$Pass=$_POST["pass"];
$Rpass=$_POST["repass"];
$County=$_POST["county"];

$sql="INSERT INTO  customer_data values ('','$Fname','$Sname','$Email','$Pass','$Rpass','$County')"

?>

