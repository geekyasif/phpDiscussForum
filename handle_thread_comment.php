<?php
 include 'db_connect.php';
 $thread_title = $_POST['thread_title'];
 $comment_content = $_POST['comment_content'];
 $sql = "INSERT INTO `comments` (`comment_content`, `comment_thread_title`) VALUES ('$comment_content', '$thread_title')";
 if($result = mysqli_query($conn,$sql)){
     $_SESSION['commentAddedSuccessfully'] = "Comment inserted successfully";
      header("location: http://localhost/php_projects/forum/read_thread.php?thread_title=$thread_title");
 }
 else{
    $_SESSION['commentAddedUnSuccessfull'] = "Comment inserted unsuccessfully";
 }
?>