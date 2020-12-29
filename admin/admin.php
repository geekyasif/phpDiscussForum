<?php include 'layout.php'; ?>


<?php
$successRegister = "";
$passwordError = "";
$emailError = "";
$usernameError = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include 'db_connect.php';
        $admin_name = $_POST['name'];
        $admin_username = $_POST['username'];
        $admin_email = $_POST['email'];
        $admin_password = $_POST['password'];
        $admin_cpassword = $_POST['cpassword'];
            $sql = "SELECT * FROM `admin` WHERE `admin_username` = '$admin_username' OR `admin_email` ='$admin_email'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
        
                $row = mysqli_fetch_assoc($result);
                if ($admin_email == $row['admin_email']) {
                   $emailError = "Email is already exists.";
                } else {
                    if ($admin_username == $row['admin_username']) {
                       $usernameError = "Username is already exists";
                    }
                }
            } else {
              
                if ($admin_password == $admin_cpassword) {
                    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
                    $sql1 = " INSERT INTO `admin` (`admin_name` , `admin_username` , `admin_email` , `admin_password`) VALUES ('$admin_name', '$admin_username' ,'$admin_email' ,'$hash_password')";
                    $result1 = mysqli_query($conn, $sql1);
                   if($result1){
                    $successRegister = "Register Successfull";
                   }else{
        
                    $unsuccessRegister = "Register unsuccessfull";
                   }
                } else {
                    $passwordError = "Password do not match";
                }
            } 

    }

?>


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-sm-8">
        <h2 class="text-center ">All Admin lists</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">admin id</th>
                <th scope="col">admin name</th>
                <th scope="col">admin username</th>
                <th scope="col">admin email</th>
                <th scope="col">datetime</th>
            </tr>
        </thead>
        <tbody>
            <?php
       
       include 'db_connect.php';
       $sql1 = "SELECT * FROM `admin`";
       $result1 = mysqli_query($conn,$sql1);
       if($num1 = mysqli_num_rows($result1) > 0){
           while($row1 = mysqli_fetch_assoc($result1)){
            $db_date = $row1['datetime'];
            $date = new DateTime($db_date);
           echo '<tr>
                    <th scope="row">'.$row1["admin_id"].'</th>
                    <td>'.$row1["admin_name"].'</td>
                    <td>'.$row1["admin_username"].'</td>
                    <td>'.$row1["admin_email"].'</td>
                    <td>'.$row1["datetime"].'</td>
                </tr>';
           }
        }
        
        ?>
        </tbody>
    </table>
        </div>
        <div class="col-sm-4">
        <h3 class="text-center">Add Admin</h3>
    <div class="container jumbotron">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php 
        if($successRegister){
                    echo '<div class="alert alert-success my-2">'.$successRegister.'</div>';
                }
        if($passwordError){
                    echo '<div class="alert alert-danger my-2">'.$passwordError.'</div>';
                }
        if($emailError){
                    echo '<div class="alert alert-danger my-2">'.$emailError.'</div>';
                }
        if($usernameError){
                    echo '<div class="alert alert-danger my-2">'.$usernameError.'</div>';
                }
        ?>
    </div>

        </div>
    </div>



   
   

</div>