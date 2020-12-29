<?php
 include 'layout.php';  
?>
<div class="container mx-auto my-4">
    <h2 class="text-center my-4">All Comments</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">comment</th>
                <th scope="col">Thread title</th>
                <th scope="col">Username</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
       include 'db_connect.php';
       $sql = "SELECT * FROM `comments`";
       $result = mysqli_query($conn,$sql);
       if($num = mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_assoc($result)){
            $db_date = $row['comment_datetime'];
            $date = new DateTime($db_date);
           echo '<tr>
                    <th scope="row">'.$row["comment_id"].'</th>
                    <td>'.$row["comment_content"].'</td>
                    <td>'.$row["comment_thread_title"].'</td>
                    <td>'.$row["comment_by"].'</td>
                    <td>'.$row["comment_datetime"].'</td>
                    <td><a href="delete_comments.php?comment_id='.$row['comment_id'].'"> Delete</a></td>
                </tr>';
           }
        }
        
        ?>
        </tbody>
    </table>

</div>