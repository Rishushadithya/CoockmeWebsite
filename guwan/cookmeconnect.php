<?php
//variable=new mysqli("serverName","userName","password","data base name");
$cook=new mysqli("localhost","root","","cookme");
if($cook->connect_error)
{
    die("CONNECTION FAILED".$cook->connect_error);
}

?>
