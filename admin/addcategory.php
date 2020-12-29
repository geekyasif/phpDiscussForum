<?php include 'layout.php'; ?>

<div class="container my-4">
    <div class="col-sm-6 mx-auto">
        <div class="jumbotron">
            <h3 class="text-center">Add Category</h3>
            <?php
            $message = false;
            $messageerror = false;
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    include 'db_connect.php';
                    $categoryName = mysqli_real_escape_string($conn,$_POST['categoryName']);
                    $categoryDescription =  mysqli_real_escape_string($conn,$_POST['categoryDescription']);
                    $sql = "INSERT INTO `categories` (`category_name`, `category_description`) VALUES ('$categoryName', '$categoryDescription')";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $message = "Category added successfully";
                    }else{
                        $messageerror = "Category not added plase add again";
                    }

                }
            
            ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="categoryName" aria-describedby="categoryname" required>
                </div>
                <div class="form-group">
                    <label for="categoryDescription">Category Description</label>
                    <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
            <?php
                if($message){
                        echo '<div class="alert alert-success text-center alert-dismissible fade show mt-3" role="alert">
                        '.$message.'.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                }
                if($messageerror){
                    echo '<div class="alert alert-danger text-center alert-dismissible fade show mt-3" role="alert">
                    '.$messageerror.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            ?>

        </div>
    </div>
</div>