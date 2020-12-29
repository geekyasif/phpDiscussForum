<?php include "header.php"?>
<div class="container my-4  col-md-6">
            <div class="thread-post my-4">
                    <?php
                        include 'db_connect.php';
                        $thread_title = $_GET['thread_title'];
                        $sql = "SELECT * FROM `threads` WHERE `thread_title` = '$thread_title' ";
                        $result = mysqli_query($conn,$sql);
                        if($num = mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $db_date = $row['thread_datetime'];
                            $date = new DateTime($db_date);
                                echo' <div class="card ">
                                        <div class="card-header media">
                                        <img src="image/user-icon.png" class="mr-3 rounded-circle" alt="..." width="26">
                                        <span><h6 class="mt-0 lead">'.$row['thread_username'].'</h6></span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">'.$row['thread_title'].'</h5>
                                            <p class="card-text">'.$row['thread_description'].'</p>
                                        </div>
                                        <div class="card-footer text-muted">
                                        <div class="post-information">
                                        <span>
                                        <i class="fa fa-tags " aria-hidden="true"></i>
                                        <a href="thread_category.php?category_name='.$row['thread_category_name'].'">'.$row['thread_category_name'].'</a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar ml-3" aria-hidden="true"></i>
                                        '.date_format($date, 'd/m/Y').'
                                    </span>
                                        </div>
                                        </div>
                                      </div>';
                     

                                    }
                                }  
                              ?>
                               
            </div>
     
           

        <div class="add-comment">
            <?php
              if(isset($_POST['postCommentBtn'])){
                  include 'db_connect.php';
                  $comment_content = $_POST['comment_content'];
                  $comment_thread_title = $_GET['thread_title'];
                  $comment_by = $_SESSION['username'];
               
                  $sql = "INSERT INTO `comments` (`comment_content`, `comment_thread_title`, `comment_by`) VALUES ('$comment_content','$comment_thread_title', '$comment_by')";
                  $result = mysqli_query($conn,$sql);
                  if($result){
                    echo'<div class="alert alert-success alert-dismissible fade show my-4" role="alert">
                    Comment added Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                 
                      
                  }else{
                    echo'<div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
                    Comment added Unsuccessfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                  }

              }
            ?>

            <div class="card shadow-sm">
                <h5 class="card-header">Add Your Comment Here</h5>
                <?php
               if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true){
                    echo '  <div class="card-body">
                                <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment_content" id="comment_content" rows="2"></textarea>
                                </div>
                                <button type="submit" name="postCommentBtn" class="btn btn-danger ">Post Comment</button>
                                </form>
                            </div>';
               }else{
                  echo ' <p class="text-center my-4">Plese Login To Start A Discussion.</p>';
               }
              ?>
            </div>
        </div>

        <div class="all-comments mt-4">
            <h4 class="ml-3 mt-4">All Comments</h4>
            <?php
               include 'db_connect.php';
               $comment_title = $_GET["thread_title"];
               $sql1 = "SELECT * FROM `comments` WHERE `comment_thread_title` = '$comment_title'
               ORDER BY `comment_id` DESC";
               $result1 = mysqli_query($conn,$sql1);
               $num1 = mysqli_num_rows($result1);
               if($num1 > 0){
                       while($row1 = mysqli_fetch_assoc($result1)){
                        $db_date = $row['thread_datetime'];
                        $date = new DateTime($db_date);
                           echo '<div class="media  py-3 px-3 ">
                                    <img src="image/user-icon.png" class="mr-3" alt="..." width="26px">
                                    <div class="media-body">
                                        <h5 class="mt-0">'.$row1['comment_by'].'<span class="ml-2"> '.date_format($date, 'd/m/Y').'</span></h5>
                                        <p>'.$row1['comment_content'].'</p>
                                    </div>
                                </div>';
                       }
                    }else{
                        echo '<p class="text-center"> No comment found! Be the First user to post a comment </p>';
                    }
            ?>
        </div>
</div> 

