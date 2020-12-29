<?php
 include 'layout.php';  
?>
<div class="container mx-auto my-4">
    <h2 class="text-center my-4">All Categories</h2>
    <a href="addcategory.php" class="btn btn-primary my-4" role="button" aria-pressed="true">Add Category</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Creation datetime</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
       include 'db_connect.php';
       $sql = "SELECT * FROM `categories`";
       $result = mysqli_query($conn,$sql);
       if($num = mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_assoc($result)){
            $db_date = $row['category_datetime'];
            $date = new DateTime($db_date);
           echo '<tr>
                    <th>'.$row["category_id"].'</th>
                    <td>'.$row["category_name"].'</td>
                    <td>'.$row["category_datetime"].'</td>
                    <td><a href="delete_category.php?category_id='.$row['category_id'].'"> Delete</a></td>
                 
                </tr>';
           }
        }
        
        ?>
        </tbody>
    </table>

</div>