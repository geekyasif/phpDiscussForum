<?php 

        include "db_connect.php";
        $contact_id = $_GET["contact_id"];
        $sql = " DELETE FROM `contact` WHERE 'sno' = '$contact_id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "Deleted successfully";
            header("location: http://localhost/projects/forum/admin/contact.php");
            exit();
        }else{
            echo "Deleted unsuccessfully";
            header("location: http://localhost/projects/forum/admin/contact.php");
            exit();
        }

?>