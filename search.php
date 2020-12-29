<?php include 'header.php'; ?>


<?php
include 'db_connect.php';
if (isset($_GET['search_term'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search_term']);
?>

<div class="container ">
    <div class="jumbotron  my-4">
        <h1 class="display-4">Search : "<?php echo $search_term; ?>"</h1>
    </div>


    <div class="col-sm-10 mx-auto">
        <div class="main-container ">
            <div class="latest-queries my-4">

                <?php
                $limit = 15;
                $sql = "SELECT * FROM `threads` WHERE `thread_title` LIKE '%$search_term%'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $db_date = $row['thread_datetime'];
                        $date = new DateTime($db_date);
                        echo '<div class="card my-4">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="read_thread.php?thread_title=' . $row['thread_title'] . '">' . $row['thread_title'] . '</a></h5>
                                    <p class="card-text text-secondary">' . substr($row['thread_description'], 0, 160) . '</p>
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
                            </div>';
                    }
                } else {
                    echo '<h4 class="text-center"> No Result Found !</h4>';
                }
            }
                ?>


            </div>

        </div>
    </div>
</div>