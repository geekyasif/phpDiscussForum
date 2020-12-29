
    <div class="recent-post mb-4">
        <div class="card shadow-sm" >
            <div class="card-header">
                <h5> Recent Queries</h5>
            </div>
            <ul class="list-group list-group-flush">
            <?php
                
                include 'db_connect.php';
                $limit = 10;
                $sql = "SELECT * FROM `threads`  ORDER BY `thread_id` DESC  LIMIT $limit";
                $result = mysqli_query($conn,$sql);
                if($num = mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
              echo '<a href="read_thread.php?thread_title='.$row['thread_title'].'" class="list-group-item list-group-item-action">'.$row['thread_title'].'</a>';
                    }
                }else{
                    echo "no post found.";
                }
               ?>
            </ul>
        </div>
    </div>
