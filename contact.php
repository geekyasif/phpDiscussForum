<?php
include "header.php";
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "db_connect.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $sql = "INSERT INTO `contact` (`name`,`email`,`description`) VALUES ('$name', '$email', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "your form has been submitted successfully";
        // header("location: localhost/projects/forum/index.php");
    } else {

        echo "your form has not been submitted successfully";
    }
}
?>
<div class="container my-4">
    <div class="col-sm-8 my-4 mx-auto">
        <h1 class="my-4">Contact us</h1>
        <form acton="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>