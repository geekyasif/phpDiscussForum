<?php

  if(isset($_SESSION["name"])){
      session_start();
    header("Location: http://localhost/projects/forum/admin/admin.php");
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>IUL DISCUSS FORUM</title>
    <style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        margin: 13% auto;
    }

    .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgb(34 41 53 / 3%);
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        font-size: 1.5rem;
        font-weight: 600;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card " style="max-width: 18rem;">
            <div class="card-header text-center">IUL DISCUSS FORUM</div>
            <div class="card-body ">
                <?php
                  if(isset($_POST['submit'])){
                      require 'db_connect.php';
                       
                       $admin_username = $_POST['admin_username'];
                       $admin_password = $_POST['admin_password'];
                       

                       
                      $sql = "SELECT * FROM `admin` WHERE `admin_username` = '$admin_username'";
                      $result = mysqli_query($conn,$sql);
                      $num = mysqli_num_rows($result);
                      if($num == 1){
                          while($row = mysqli_fetch_assoc($result)){
                              $hash_password = $row['admin_password'];
                              if(password_verify($admin_password,$hash_password)){
                                  session_start();
                                  echo "logged in";
                                  $_SESSION['loggedin'] == true;
                                  $_SESSION['admin_id'] = $row['admin_id'];
                                  $_SESSION['admin_fullname'] = $row['admin_fullname'];
                                  $_SESSION['admin_username'] = $row['admin_username'];
                                  
                                 header("location: http://localhost/projects/forum/admin/admin.php");
                              }else{
                                  echo "worng password";
                              }
                          }
                          
                      }else{
                          echo "user not found";
                      }
                  }
                ?>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="admin_username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="admin_password" id="pasword">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>