
    <?php include 'addQuery.php'; ?>
    <div class="main-container">

        <div class="latest-queries my-4">
            <?php
       
        include 'db_connect.php';
        $sql = "SELECT * FROM `threads` ORDER BY `thread_id` DESC";
        $result = mysqli_query($conn,$sql);
        if($num = mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $db_date = $row['thread_datetime'];
                $date = new DateTime($db_date);
               
                echo' <div class="card my-4">
                <div class="card-body">
                    <h5 class="card-title"><a href="read_thread.php?thread_title='.$row['thread_title'].'">'.$row['thread_title'].'</a></h5>
                    <p class="card-text text-secondary">'.substr($row['thread_description'],0,160).'</p>
                </div>
                <div class="card-footer text-muted">
                <div class="post-information  py-0">
                        <small>
                        <span>
                        <i class="fa fa-tags " aria-hidden="true"></i>
                        <a href="thread_category.php?category_name='.$row['thread_category_name'].'">'.$row['thread_category_name'].'</a>
                         <i class="fa fa-calendar ml-2" aria-hidden="true"></i> '.date_format($date, 'd/m/Y').'
                        </span>
                   
                        </small>
                        <p class="float-right">'.$row['thread_username'].'</p> 
                   
                </div>
                </div>
              </div>';
                
              
            }
        }else{
            echo "no post found";
        }
        
        ?>

        </div>

    </div>
