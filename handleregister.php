<?php
 
 include 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
//  echo "working";
    $sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` ='$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {

        $row = mysqli_fetch_assoc($result);
        if ($email == $row['user_email']) {
            echo "email already exists";
            // $emailAlert = true;
        } else {
            if ($username == $row['username']) {
                echo "username  already exists";
                // $usernameAlert = true;
            }
        }
    } else {
      
        if ($password == $cpassword) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql1 = " INSERT INTO `users` (`username` , `user_phone` , `user_email` , `user_password`) VALUES ('$username', '$phone' ,'$email' ,'$hash_password')";
            $result1 = mysqli_query($conn, $sql1);
           if($result1){
           header("location:  http://localhost/projects/forum/index.php");
            exit();
           }else{

               echo 0;
           }
        } else {
            echo "password erroe";
        }
    }
}

?>
