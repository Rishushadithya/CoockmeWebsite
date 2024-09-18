<?php

$con = new mysqli("localhost","root","","cookmeweb");

 if($con->connect_error){

 }
 else{
    echo "you can fill sucessful";
 }
?>