
    <div class="sidebar mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Categories</h5>

            </div>
            <ul class="list-group list-group-flush categories" >
            <?php
             include 'db_connect.php';
             $sql = "SELECT * FROM `categories`";
             $result = mysqli_query($conn,$sql);
             $num = mysqli_num_rows($result);
             if($num > 0){
                     while($row = mysqli_fetch_assoc($result)){
           
               echo  '<a href="thread_category.php?category_name='.$row['category_name'].'" class="list-group-item list-group-item-action">'.$row['category_name'].'<span class="badge badge-danger badge-pill float-right mt-1">'.$row['no_of_post'].'</span></a>';

               ?>
                <?php
                 }
                }else{
                    echo "no category found";
                }
                ?>
            </ul>
        </div>
    </div>
