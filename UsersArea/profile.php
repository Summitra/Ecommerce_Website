<!-- connect file -->
<?php
    include('../includes/connect.php');
    include('../Functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </link>

    <!-- link to style.css -->
    <link rel="stylesheet" href="../style.css">

    <style>
    body {
        overflow-x: hidden;
    }

    .logo {
        width: 4%;
        height: 4%;
    }

    .card-img-top {
        height: 200px;
        object-fit: contain;
    }

    .profile_img {
        margin: auto;
        display: block;
        width: 80%;
        height: 95%;
    }
    .edit_img{
        width: 100px;
        height:100px;
        object-fit:contain;
    }
    #image{
        height: 70px;
    }
    


    </style>

</head>

<body>

    <!-- navbar -->

    <div class="container-fluid p-0">
        <!-- first child -->

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">

                <img src="../images/logo.png" alt="" class="logo"></img>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i
                                    class="fa-sharp fa-solid fa-cart-shopping"></i><b><sup><?php cart_item();?></sup></b></a>
                        </li>

                        <li class="nav-item">
                            <b><a class="nav-link" href="#">Total Price : <?php total_cart_price();?>/-</a></b>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                            aria-label="Search">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- calling cart() function -->
        <?php
  cart();
 ?>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

            <ul class="navbar-nav me-auto">

                <?php
                      if(!isset($_SESSION['username'])){
                        echo " <li class='nav-item'>
                  <b><a class='nav-link' href = '#'>Welcome Guest</a></b>
                      </li>";
                    }else{
                        echo "<li class = 'nav-item'>
                      <b>  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']." !!</a></b>
                        </li>";
                    }


                    if(!isset($_SESSION['username'])){
                        echo "<li class = 'nav-item'>
                        <b><a class='nav-link' href='./user_login.php'>Login</a></b>
                        </li>";
                    }
                    else{
                        echo "<li class = 'nav-item'>
                        <b><a class='nav-link' href='logout.php'>Logout</a></b>
                        </li>";
                    }
                ?>

            </ul>
        </nav>


        <!-- Third Child -->

        <div class="bg-light">
            <h3 class="text-center">HIGH QUALITY</h3>
            <p class="text-center">Online Tyres & Tubes Ecommerce Web Portal. Products At Fair Prices.</p>
        </div>


        <!-- Fourth Child -->

        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>

                    <?php
                    if(isset($_SESSION['username']))
                    {
                        $username = $_SESSION['username'];
                        $user_image = "Select * from `users_table` where username='$username'";
                        $result_image = mysqli_query($con, $user_image);
                        $fetch_image = mysqli_fetch_assoc($result_image);
                        $show_image = $fetch_image['user_image'];
                        echo "<li class='nav-item my-3 mx-2 mb-3'>
                          <img src='./User_images/$show_image' class='profile_img' alt=''>
                      </li>";
                    }
                    else{
                        echo "<li class='nav-item my-3 mx-2 mb-3'>
                          <img src='../images/user_demo.jfif' class='profile_img' alt=''>
                      </li>";
                    }

             

            
            ?>


                    <li class="nav-item mb-2">
                        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link text-light" href="profile.php?user_orders">My Orders</a>
                    </li>

                    <li class="nav-item  mb-2">
                        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                      get_user_order_details(); 
                      if(isset($_GET['edit_account'])){
                       include ('edit_account.php');
                        }

                        if(isset($_GET['user_orders'])){
                            include ('user_orders.php');
                             }

                             if(isset($_GET['delete_account'])){
                                include ('delete_account.php');
                                 }
                    ?>
            </div>
        </div>


        <!-- last child -->'

        <?php
    include("../includes/footer.php");
   ?>

    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>