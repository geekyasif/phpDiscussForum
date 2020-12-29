<?php

$server = "localhost";
$username =  "root";
$password = "";
$database = "iulforum";

$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
//    echo "connected successfully to the database"; 
}else{
    die("can't connect to the database");
}

?>