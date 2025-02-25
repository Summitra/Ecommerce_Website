<!-- connect file -->
<?php
    include('includes/connect.php');
    include('Functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </link>

    <!-- link to style.css -->
    <link rel="stylesheet" href="style.css">

    <style>
    .logo {
        width: 4%;
        height: 4%;
    }

    .card-img-top {
        height: 200px;
        object-fit: contain;
    }
    </style>

</head>

<body>

    <!-- navbar -->

    <div class="container-fluid p-0">
        <!-- first child -->

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">

                <img src="./images/logo.png" alt="" class="logo"></img>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./UsersArea/user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./UsersArea/profile.php">UserProfile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i
                                    class="fa-sharp fa-solid fa-cart-shopping"></i><b><sup><?php cart_item();?></sup></b></a>
                        </li>

                        <li class="nav-item">
                            <b><a class="nav-link" href="#">Total Price : <?php total_cart_price();?>/-</a></b>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                            aria-label="Search">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

            <ul class="navbar-nav me-auto">


                <?php

                        if(!isset($_SESSION['username'])){
                            echo " <li class='nav-item'>
                       <b> <a class='nav-link' href = '#'>Welcome Guest</a></b>
                        </li>";
                        }else{
                            echo "<li class = 'nav-item'>
                          <b>  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']." !!</a></b>
                            </li>";
                        } 
                    if(!isset($_SESSION['username'])){
                        echo "<li class = 'nav-item'>
                        <b><a class='nav-link' href='./UsersArea/user_login.php'>Login</a></b>
                        </li>";
                    }else{
                        echo "<li class = 'nav-item'>
                        <b><a class='nav-link' href='./UsersArea/logout.php'>Logout</a></b>
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


        <!-- fourth child -->

        <div class="row px-1">
            <div class="col-md-10">
                <!-- products -->
                <!-- box1 -->
                <div class="row">




                    <!-- fetching products -->
                    <?php
                // calling functions
                get_all_products();
                get_unique_categories();
                get_unique_brands();
              ?>


                    <!-- Row end-->
                </div>

                <!-- column end -->
            </div>



            <!-- sidenav -->
            <div class="col-md-2 bg-secondary p-0">


                <!-- Brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h6>Delivery Brands</h6>
                        </a>
                    </li>

                    <?php
                // calling getbrands function
                   getbrands();
                  
                ?>

                </ul>


                <!-- Categories to be displayed -->

                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h6>Categories</h6>
                        </a>
                    </li>

                    <?php
                  // calling to the getcategories() function
                    getcategories()
                ?>

                </ul>

            </div>
        </div>


        <!-- last child -->'

        <?php
    include("./includes/footer.php");
   ?>

    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>