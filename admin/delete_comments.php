<?php 

        include "db_connect.php";
        $comment_id = $_GET["comment_id"];
        $sql = " DELETE FROM `comments` WHERE 'comment_id' = '$comment_id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "Deleted successfully";
            header("location: http://localhost/projects/forum/admin/comments.php");
            exit();
        }else{
            echo "Deleted unsuccessfully";
            header("location: http://localhost/projects/forum/admin/comments.php");
            exit();
        }

?>