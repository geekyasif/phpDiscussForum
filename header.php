<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tiny.cloud/1/5vh0rthzdcfm6o5wlr5jny319egdyydsv7p3ax96i5qm84ul/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/typed.js"></script>
    <script src="js/typedjs.js"></script>
    <title>IUL DISCUSS FORUM</title>

    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        
    }
    .mainHeadingDiv{
    margin-top: 85px;
    padding: 0px 58px;
    }
    body{
        background-color: #FAFAFA;
    }

    a{
        color: black;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark py-3 px-4  bg-dark border-bottom shadow-sm ">
        <!-- <div class="container"> -->
        <a class="navbar-brand font-weight-bold" href="index.php">IUL DISCUSS FORUM</a>
        <button class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <?php
                             include 'db_connect.php';
                             $sql = "SELECT * FROM `categories`";
                             $result = mysqli_query($conn,$sql);
                             $num = mysqli_num_rows($result);
                                     while($row = mysqli_fetch_assoc($result)){
                            echo '<a class="dropdown-item" href="thread_category.php?category_name='.$row['category_name'].'">'.$row['category_name'].'</a>';
                                     }
                            ?>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 ml-2" action="search.php" method="get">
                <input class="form-control mr-sm-2" type="search" name="search_term" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger my-2 my-sm-0" type="submit"><span>  <i class="fa fa-search mr-2  bg-transparent" aria-hidden="true"></i> </span>Search</button>
            </form>
            <?php
            
            if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true){

                echo ' <div class="btn-group ml-2">
                        <button type="button" class="btn btn-dark">
                        <span>
                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                        </span> 
                        Hello 
                        '. $_SESSION['username'].'
                        </button>
                        <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split"       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="user-profile.php?profile='.$_SESSION['username'].'">
                                <span>
                                    <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                </span> 
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <span>
                                     <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                </span>
                                Setting
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">
                                <span>
                                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                </span>
                                Log out
                            </a>
                        </div>
                        </div>';
            
            }
            // else{
            //     echo '<div class="userLoginBtn ml-3">';
            //     include 'register.php';
            //     include 'login.php';
            //     echo '</div>';
            //     }
            //     ?>
        </div>
        <!-- </div> -->
    </nav>
    
        <?php
    
                
        // login alert
        if(isset($_SESSION['successLogin']) && $_SESSION['successLogin'] !='' ){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        '.$_SESSION['successLogin'].'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        unset($_SESSION['successLogin']);
        }
        // login alert ends here

        // Post query alert 
        if(isset($_SESSION['postAddedSuccessfull']) && $_SESSION['postAddedSuccessfull'] !=''){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        '.$_SESSION['postAddedSuccessfull'].'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        unset($_SESSION['postAddedSuccessfull']);
        }

        if(isset($_SESSION['postAddedUnSuccessfull']) && $_SESSION['postAddedUnSuccessfull']!=''){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            '.$_SESSION['postAddedUnSuccessfull'].'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            unset($_SESSION['postAddedUnSuccessfull']);
        }
        // post query end here


        ?>


    <!-- Optional JavaScript -->
    <script>
        tinymce.init({
    selector: '#thread_description'
  });

    </script>
    <script src="jquery/jquery.js"></script>
    <script src="js/javascript.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>