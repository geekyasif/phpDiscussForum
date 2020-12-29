<?php include 'header.php'; ?>



<div class="container my-4 jumbotron  border-bottom">
    <?php
    include 'db_connect.php';
    $thread_category_name = $_GET["category_name"];
    $sql = "SELECT * FROM `categories` WHERE `category_name` = '$thread_category_name'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {


        echo '<h1 class="display-4 ">' . $row['category_name'] . '</h1>
                <p class="lead">' . $row['category_description'] . '</p>';
    }
        ?>

</div>

</div>

<div class="container">

    <div class="row">


        <div class="col-sm-8">
            <!-- discussion section starts here -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                include 'db_connect.php';
                $thread_username = $_SESSION['username'];
                $thread_category_name = $_GET['category_name'];
                $thread_title = $_POST['thread_title'];
                $thread_description = $_POST['thread_description'];

                $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_name`, `thread_username`) VALUES ('$thread_title', '$thread_description', '$thread_category_name', '$thread_username');";
                $sql .= "UPDATE `categories` SET no_of_post = no_of_post + 1 WHERE `category_name` = '$thread_category_name'";
                $result = mysqli_multi_query($conn, $sql);
                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Start A Discussion</h4>
                </div>
                <?php
                if (isset($_SESSION['username']) && $_SESSION['loggedin'] == true) {

                    echo ' <div class="card-body">
                        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                            <div class="form-group">
                                <label for="thread_title">Title</label>
                                <input type="text" class="form-control" id="thread_title" name="thread_title"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="thread_description">Description</label>
                                <textarea class="form-control" name="thread_description" id="thread_description" rows="5"></textarea>
                            </div>
                            <button type="submit" name="submitDiscussion" class="btn btn-danger">Add Query</button>
                        </form>
                    </div>';
                } else {
                    echo ' <p class="text-center my-4">Plese Login To Start A Discussion.</p>';
                }
                ?>
            </div>
            <!-- discussion secstion ends here -->

            <!-- Browser question sections starts here  -->

            <div class="alert alert-secondary my-4" role="alert">
                <h4>Browse Questions</h4>
            </div>
            <div class="latest-queries my-4">
                <?php
                include 'db_connect.php';
                $thread_category_name = $_GET["category_name"];
                $sql = "SELECT * FROM `threads` WHERE `thread_category_name` = '$thread_category_name'
                ORDER BY `thread_id` DESC";
                $result = mysqli_query($conn, $sql);
                if ($num = mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $db_date = $row['thread_datetime'];
                        $date = new DateTime($db_date);
                        echo '
               <div class="card my-4">
                <div class="card-body">
                    <h5 class="card-title"><a href="read_thread.php?thread_title=' . $row['thread_title'] . '">' . $row['thread_title'] . '</a></h5>
                    <p class="card-text text-secondary">' . $row['thread_description'] . '</p>
                </div>
                <div class="card-footer text-muted">
                <div class="post-information  py-0">
                        <span>
                        <i class="fa fa-tags " aria-hidden="true"></i>
                        <a href="thread_category.php?category_name=' . $row['thread_category_name'] . '">' . $row['thread_category_name'] . '</a>
                         <i class="fa fa-calendar ml-3" aria-hidden="true"></i> ' . date_format($date, 'd/m/Y') . '
                        </span>
                   
                      <p class="float-right">' . $row['thread_username'] . '</p> 
                   
                </div>
                </div>
              </div>
              ';
                    }
                } else {
                    echo '<p class="text-center">No post found! Be the First user to post a query </p>';
                }

                ?>

            </div>
            <!-- Browse question section ends here -->
        </div>

        <div class="col-sm-4">
            <div class="related Queries mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>Related Queries</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php
                        include 'db_connect.php';
                        $thread_category_name = $_GET["category_name"];
                        $sql = "SELECT * FROM `threads` WHERE `thread_category_name` = '$thread_category_name'
                        ORDER BY `thread_id` DESC";
                        $result = mysqli_query($conn, $sql);
                        if ($num = mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<a href="read_thread.php?thread_title='.$row['thread_title'].'" class="list-group-item list-group-item-action">'.$row['thread_title'].'</a>';
                                    }
                                }else{
                                    echo "no post found.";
                                }
                    ?>
                    </ul>
                </div>
            </div>

        <div class="recent-sidebar mb-4">

            <?php
                include 'recent-sidebar.php';
                ?>
        </div>
        <div class="category-sidebar">
            <?php include 'category-sidebar.php'; ?>
        </div>

    </div>
</div>

</div>