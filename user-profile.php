<?php include 'header.php'; ?>
<div class="container my-5">

    <div class="row">
        <div class="col-sm-3 bg-white border shadow-sm ">
            <div class="user-img text-center my-4">
                <img src="image/user-icon.png" alt="" class="rounded-circle" width="116px" height="116px">
            </div>
            <?php
               include 'db_connect.php';
               $username = $_SESSION['username'];
               $sql = "SELECT * FROM `users` WHERE `username` = '$username'" ;
               $result = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_assoc($result)
            ?>
            <form>
                <!-- <div class="form-group ml-5">
                    <small><label for="exampleFormControlFile1">Change Profile Image</label>
                        <input type="file" class="form-control-file " id="exampleFormControlFile1"></small>
                </div> -->
                <div class="form-group">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" id="inputEmail4" value="<?php echo $row['username']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Phone</label>
                    <input type="email" class="form-control" id="inputEmail4" value=" <?php echo $row['user_phone']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" value="<?php echo $row['user_email']; ?>" disabled>
                </div>
            </form>
           <div class="change-password text-center my-4">
           <a href="change_password.php" >Change Password</a>
           </div>
        </div>

        <div class="col-sm ml-3 bg-white border shadow-sm ">
            <h2 class="text-center my-3">My All Posts</h2>
          
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Title</th>
                        <th scope="col">category</th>
                        <th scope="col">Date</th>
                        <!-- <th scope="col">Comments</th> -->
                        <!-- <th scope="col">Edit</th> -->
                        <!-- <th scope="col">Delete</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php 
                 include 'db_connect.php';
                  $username = $_SESSION['username'];
                  $sql = "SELECT * FROM `threads` WHERE `thread_username` = '$username'" ;
                  $result = mysqli_query($conn,$sql);
                  if($num = mysqli_num_rows($result)){
                      $sno = 1 ;
                    while($row = mysqli_fetch_assoc($result)){
                        $db_date = $row['thread_datetime'];
                        $date = new DateTime($db_date);
                        // $sql = "SELECT * FROM `comments` WHERE `comment_title` = '$row['comment_thread_title']'";
                        // $result = mysqli_query($conn,$sql);
                        // $num = mysqli_num_rows($result);

                  echo '<tr>
                            <th scope="row">'.$sno.'</th>
                            <td>'.$row['thread_title'].'</td>
                            <td>'.$row['thread_category_name'].'</td>
                            <td>'.date_format($date, 'd/m/Y').'</td>
                        
                        </tr> ';
                      $sno++;          
                  }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- <td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></td> -->
                            <!-- <td><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->