<?php 

        include "db_connect.php";
        $thread_id = $_GET["thread_id"];
        $sql = " DELETE FROM `threads` WHERE thread_id = '$thread_id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "Deleted successfully";
            header("location: http://localhost/projects/forum/admin/threads.php");
            exit();
        }else{
            echo "Deleted unsuccessfully";
            header("location: http://localhost/projects/forum/admin/threads.php");
            exit();
        }

?>