<?php
 include 'layout.php';  
?>
<div class="container mx-auto my-4">
    <h2 class="text-center my-4">All Threads</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">thread_id</th>
                <th scope="col">thread_username</th>
                <th scope="col">thread_title</th>
                <th scope="col">thread_category</th>
                <th scope="col">thread_datetime</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
       include 'db_connect.php';
       $sql = "SELECT * FROM `threads`";
       $result = mysqli_query($conn,$sql);
       if($num = mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_assoc($result)){
            $db_date = $row['thread_datetime'];
            $date = new DateTime($db_date);
           echo '<tr>
                    <th scope="row">'.$row["thread_id"].'</th>
                    <td>'.$row["thread_username"].'</td>
                    <td>'.$row["thread_title"].'</td>
                    <td>'.$row["thread_category_name"].'</td>
                    <td>'.$row["thread_datetime"].'</td>
                    <td><a href="delete_thread.php?thread_id='.$row['thread_id'].'"> Delete Thread</a></td>
                </tr>';
           }
        }
        
        ?>
        </tbody>
    </table>

</div>