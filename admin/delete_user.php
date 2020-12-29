<?php 

        include "db_connect.php";
        $user_id = $_GET["user_id"];
        $sql = " DELETE FROM `users` WHERE 'user_id' = '$user_id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "Deleted successfully";
            header("location: http://localhost/projects/forum/admin/users.php");
            exit();
        }else{
            echo "Deleted unsuccessfully";
            header("location: http://localhost/projects/forum/admin/users.php");
            exit();
        }

?>