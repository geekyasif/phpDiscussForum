<?php 

        include "db_connect.php";
        $category_id = $_GET["category_id"];
        $sql = " DELETE FROM `categories` WHERE 'category_id' = '$category_id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "Deleted successfully";
            header("location: http://localhost/projects/forum/admin/category.php");
            exit();
        }else{
            echo "Deleted unsuccessfully";
            header("location: http://localhost/projects/forum/admin/category.php");
            exit();
        }

?>