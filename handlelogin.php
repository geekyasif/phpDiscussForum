
            <?php
               
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                include 'db_connect.php';
                $username = $_POST['username'];
                $password = $_POST['password'];
                

            $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
            $result = mysqli_query($conn,$sql);
            if($num= mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                if($username != $row['username']){
                    $errorLogin = "invalid Credentials";
                    header('location: http://localhost/projects/forum/index.php');
                    exit();
                
                }else{
                    if(password_verify($password, $row['user_password'])){
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $username = $row['username'];
                        $_SESSION['username'] =  $username;
                        $user_id = $row['user_id'];
                        $_SESSION['user_id'] = $user_id; 
                        $_SESSION['successLogin'] = "You have logged in successfully";
                        header('location: http://localhost/projects/forum/index.php');
                        exit();
                    }else{
                        $errorLogin = "invalid Credentials";
                        header('location: http://localhost/projects/forum/index.php');
                        exit();
                        
                    }
                }

            }else{
                $errorLogin = "invalid Credentials";
                header('location: http://localhost/projects/forum/index.php');
                exit();
                
            }
            }

            ?>