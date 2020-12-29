

<div class="add-query">
    <div class="card shadow-sm text-center">
        <h5 class="card-header">Add Your Query Here</h5>
        <div class="card-body">
        <?php
        
        if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true){
            echo '<h5 class="card-title lead">What is your question or links ?
                <span>
                    <a href="#" class="btn btn-danger btn-sm ml-3 mt-1" data-toggle="modal" data-target="#addQueryModal">Add
                        Question</a>
                </span>
            </h5>';
        }else{
            echo '<p>You are not login, Please Login to add Query.</p>';
        }
      
        ?>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addQueryModal" tabindex="-1" aria-labelledby="addQueryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQueryModalLabel">What is your question or links ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="handleaddQuery.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="thread_title">

                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="thread_description" name="thread_description" rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="category">Category</label>
                        <select id="thread_category_id" name="thread_category_name" class="form-control">
                            <option selected>Choose Category</option>
                            <?php
                             include "db_connect.php";
                             $sql = "SELECT * FROM `categories`";
                             $result = mysqli_query($conn,$sql);
                             if($num = mysqli_num_rows($result) > 0){
                                 while($row = mysqli_fetch_assoc($result)){
                                     echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
                                 }
                             }
                            ?>
                        </select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block " name="submit" id="postQuery">Post Query</button>
                </form>
            </div>
          
        </div>
    </div>
</div>