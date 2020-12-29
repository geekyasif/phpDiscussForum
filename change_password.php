<?php
 include 'header.php';
?>

<?php
   if($_SERVER['REQUEST_METHOD'] == "POST"){
       include 'db_connect.php';
       $username = $_SESSION['username'];
       $currentPassword = $_POST['currentPassword'];
       $newPassword = $_POST['newPassword'];

       $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
       $result = mysqli_query($conn,$sql);
           if($num = mysqli_num_rows($result) > 0){
               $row = mysqli_fetch_assoc($result);
               if(password_verify($currentPassword,$row['user_password'])){
                $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
                   $sql1 = "UPDATE `users` SET `user_password`= '$hash_password' WHERE `username` = '$username'";
                   $result1 = mysqli_query($conn,$sql1);
                   if($result1){
                       echo 'password changed successfully';
                       header('location: localhost/projects/forum/change_password.php');
                   }

               }else{
                   echo 'incorrect password';
               }

           }
    }      
   
?>
<div class="container my-4">
    <div class="col-sm-6 mx-auto">
    <h4 class="text-center my-4">Change your Password</h4>
        <div class="container jumbotron">
            <form action="<?php $_SERVER['PHP_SELF']; ?> <" method="POST">
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword" aria-describedby="password">
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>

        </div>
    </div>

</div>