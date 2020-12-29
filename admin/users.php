<?php
 include 'layout.php';  
?>
<div class="container mx-auto my-4">
    <h2 class="text-center my-4">All Users</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">user_id</th>
                <th scope="col">username</th>
                <th scope="col">user_phone</th>
                <th scope="col">user_email</th>
                <th scope="col">user_datetime</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
       include 'db_connect.php';
       $sql = "SELECT * FROM `users`";
       $result = mysqli_query($conn,$sql);
       if($num = mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_assoc($result)){
             
           echo '<tr>
                    <th scope="row">'.$row["user_id"].'</th>
                    <td>'.$row["username"].'</td>
                    <td>'.$row["user_phone"].'</td>
                    <td>'.$row["user_email"].'</td>
                    <td>'.$row["user_datetime"].'</td>
                    <td><a href="delete_user.php?user_id='.$row['user_id'].'"> Delete User</a></td>
                </tr>';
           }
        }
        
        ?>
        </tbody>
    </table>

</div>