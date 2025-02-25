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
    <title>Admin Dashboard</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </link>



    <!-- css file -->
    <link rel="stylesheet" href="../style.css">


    <style>
    .admin_image {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .logo {
        width: 4%;
        height: 4%;
    }

    .card-img-top {
        width: 100%;
        height: 250px;
        object-fit: contain;
    }

    .footer {
        position: absolute;
        bottom: 0;
    }

    body {
        overflow-x: hidden;
        /* overflow-y :hidden; */
    }
    .product_img{
        width: 100px;
        object-fit:contain;
    }
    #product_image1{
        height: 70px;
    }
    #product_image2{
        height: 70px;
    }
    #product_image3{
        height: 70px;
    }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">

        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav ">
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li> -->

                        <li class="nav-item">
                        <a class="nav-link text-dark" href="admin_login.php">Login</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link text-dark"  href="admin_registration.php">Register</a>
                        </li>

                        <?php
                      if(!isset($_SESSION['ad_name'])){
                        echo " <li class='nav-item'>
                  <b><a class='nav-link' style='padding-right:35px;' href = '#'>Welcome Guest</a></b>
                      </li>";
                    }else{
                        echo "<li class = 'nav-item'>
                      <b>  <a class='nav-link' href='#'>Welcome ".$_SESSION['ad_name']." !!</a></b>
                        </li>";
                    }


                    if(!isset($_SESSION['username1'])){
                        // echo "<li class = 'nav-item'>
                        // <b><a class='nav-link' href='./Admin/admin_login.php'>Login</a></b>
                        // </li>";
                    }else{
                        echo "<li class = 'nav-item'>
                        <b><a class='nav-link' href='admin_logout.php'>Logout</a></b>
                        </li>";
                    }
                ?>
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- second child -->

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->

       
        <div class="row">
            <div class="col-md-12 bg-secondary p-2 d-flex align-items-center">

            <form method="post" enctype="multipart/form-data">
                <div class="px-3">
                <?php
                    if(!isset($_SESSION['ad_name']))
                    {
                        echo "<a href='#'><img src='../images/admin_demo.jfif' alt='' class='admin_image mt-2'></a>";
               
                    }
                    else{
                         $username = $_SESSION['ad_name'];
                         $admin_image = "Select * from `admin_table` where admin_name ='$username'";
                        $result_image = mysqli_query($con, $admin_image);
                        $fetch_image = mysqli_fetch_assoc($result_image);
                        $show_image = $fetch_image['admin_image'];
                        echo " <a href='#'><img src='./admin_images/$show_image' alt='' class='admin_image mt-2'></a>";
                
                    }
                ?>

                <?php
                      if(!isset($_SESSION['ad_name'])){
                        echo "<p class='text-light text-center mt-2 fw-bold'>Admin Name</p>";
                 
                    }else{
                        echo "<p class='text-light text-center fw-bold'>".$_SESSION['ad_name']."</p>";
                    }
                ?>
                </div>
                </form>

                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                
                <div class="button text-center">
                    <button class="my-4 mx-1"><a href="insert_product.php" class="nav-link text-dark bg-info my-1 p-2" style="padding-right:20px;">
                            <b>Insert Products</b></a></button>

                    <button class="mx-1"><a href="index.php?view_products" class="nav-link text-dark bg-info my-1 p-2">
                            <b>View Products</b></a></button>

                    <button class="mx-1"><a href="index.php?insert_category" class="nav-link text-dark bg-info my-1 p-2">
                            <b>Insert Categories</b></a></button>

                    <button class="mx-1"><a href="index.php?view_categories" class="nav-link text-dark bg-info my-1 p-2">
                            <b>View Categories</b></a></button>

                    <button class="mx-1"><a href="index.php?insert_brand" class="nav-link text-dark bg-info my-1 p-2">
                            <b>Insert Brands</b></a></button>

                    <button class="mx-1"><a href="index.php?view_brands" class="nav-link text-dark bg-info my-1 p-2">
                            <b>View Brands</b></a></button>

                    <button class="mx-1"><a href="index.php?list_orders" class="nav-link text-dark bg-info my-1 p-2">
                            <b>All Orders</b></a></button>

                    <button class="mx-1"><a href="index.php?list_payments" class="nav-link text-dark bg-info my-1 p-2">
                            <b>All Payments</b></a></button>

                    <button class="mx-1"><a href="index.php?list_users" class="nav-link text-dark bg-info my-1 p-2">
                            <b>Users List</b></a></button>

                    <button class="mx-3"><a href="admin_login.php" class="nav-link text-light bg-danger my-1 p-2">
                            <b>Logout</b></a></button>
                </div>
                
            </div>
        </div>



        <!-- fourth child -->

        <div class="container my-3">
            <?php
                    if(isset($_GET['insert_category'])){
                        include('insert_categories.php');
                    }
                    if(isset($_GET['insert_brand'])){
                        include('insert_brands.php');
                    }
                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if(isset($_GET['edit_product'])){
                        include('edit_product.php');
                    }
                    if(isset($_GET['delete_product'])){
                        include('delete_product.php');
                    }
                    if(isset($_GET['view_categories'])){
                        include('view_categories.php');
                    }
                    if(isset($_GET['view_brands'])){
                        include('view_brands.php');
                    }
                    if(isset($_GET['edit_category'])){
                        include('edit_category.php');
                    }
                    if(isset($_GET['delete_category'])){
                        include('delete_category.php');
                    }
                    if(isset($_GET['edit_brand'])){
                        include('edit_brand.php');
                    }
                    if(isset($_GET['delete_brand'])){
                        include('delete_brand.php');
                    }
                    if(isset($_GET['list_orders'])){
                        include('list_orders.php');
                    }
                    if(isset($_GET['delete_order'])){
                        include('delete_order.php');
                    }
                    if(isset($_GET['list_payments'])){
                        include('list_payments.php');
                    }
                    if(isset($_GET['delete_payment'])){
                        include('delete_payment.php');
                    }
                    if(isset($_GET['list_users'])){
                        include('list_users.php');
                    }
                    if(isset($_GET['delete_user'])){
                        include('delete_user.php');
                    }
                 ?>

        </div>


        <!-- last child -->

    <?php
        include("../includes/footer.php");
   ?>
    </div>



    <!-- bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    </body>

</html>