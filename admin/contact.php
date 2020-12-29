<?php
 include 'layout.php';  
?>
<div class="container mx-auto my-4">
    <h2 class="text-center my-4">All contacts</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">comment_id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">Description</th>
                <th scope="col">Date/Time</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
       include 'db_connect.php';
       $sql = "SELECT * FROM `contact`";
       $result = mysqli_query($conn,$sql);
       if($num = mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_assoc($result)){
            $db_date = $row['datetime'];
            $date = new DateTime($db_date);
           echo '<tr>
                    <th scope="row">'.$row["sno"].'</th>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["description"].'</td>
                    <td><a href="delete_contact.php?contact_id='.$row['sno'].'"> Delete contact</a></td>
                </tr>';
           }
        }
        
        ?>
        </tbody>
    </table>

</div>