<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
  include 'db_connect.php';
   
  $thread_title = mysqli_real_escape_string($conn,$_POST['thread_title']);
  $thread_description = mysqli_real_escape_string($conn,$_POST['thread_description']);
  $thread_category_name = mysqli_real_escape_string($conn,$_POST['thread_category_name']);
  $thread_username = $_SESSION['username'];
  $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_name`, `thread_username`) VALUES ('$thread_title', '$thread_description', '$thread_category_name', '$thread_username');";
  $sql .= "UPDATE  `categories` SET no_of_post = no_of_post + 1 WHERE `category_name` = '$thread_category_name' ";
 
  if(mysqli_multi_query($conn, $sql)){
    $_SESSION['postAddedSuccessfull'] = "You query has been added successfully";
    header("location: index.php");
    exit();
    }else{
      $_SESSION['postAddedUnSuccessfull'] = "You query has not been added successfully";
     
      header("location: index.php");
      exit();
  }
 
}
?>