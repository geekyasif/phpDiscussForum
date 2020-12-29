
<?php include 'header.php'; ?>


<div class="container-fluid border-bottom bg-white">
  <div class="row">
  <div class="col-md-6 mainHeadingDiv d-block mx-auto">
     <h2 class="my-4"><span id="typed"></span></h2>
     <p class="lead">Iul Discuss Forum is dedicated to developing and maintaining a friendly online community, where members of all technical backgrounds feel relaxed and comfortable.</p>
    <p class="lead">Like any community, Iul Discuss Forum has certain standards. When members join our forums, they agree to abide by these rules. Repeated violations of these standards may result in a member being barred from entry or participation in the community forums.</p>
    <?php
        echo '<div class="userLoginBtn my-3">';
        if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true){
    
        }else{
          include 'register.php';
          include 'login.php';
        }
        echo '</div>';
    ?>
   </div>
   <div class="col-md-6">
    <div class="mainImg">
    <img class="img-fluid" src="image/mainforumlogo2.jpg" alt="" width="650px">
    </div>
   </div>
  </div>
</div>

<!-- main container starts here -->
<div class="container my-4">
    <div class="row">
        <?php
        echo'<div class="col-sm-8">';
              include "main-content.php";
        echo'</div>';
        echo'<div class="col-sm-4">';
        include "recent-sidebar.php";
         include "category-sidebar.php";
         echo'</div>';
        ?>
    </div>
    
    
</div>

<?php include 'footer.php'; ?>
