<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "test";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}else{
 //echo "<script>alert('Connected')</script>" ;  
}