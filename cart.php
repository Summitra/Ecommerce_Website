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
    <title>Ecommerce- Cart Details</title>

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

    .cart_img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .table {
        border: 1px solid black;
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
                    </ul>
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
                  <b>  <a class='nav-link' href = '#'>Welcome Guest</a></b>
                      </li>";
                    }else{
                        echo "<li class = 'nav-item'>
                        <b><a class='nav-link' href='#'>Welcome ".$_SESSION['username']." !!</a></b>
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

        <br>

        <!-- Fourth Child table -->

        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">


                        <!-- Php code to display dynamic data -->

                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();
                        $total = 0;
                        $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con,$cart_query);
                        $result_count = mysqli_num_rows($result);
                        if($result_count > 0)
                        {
                          echo "<thead>
                        <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan = '2'>Operations</th>   

                      </tr>
                </thead>
                <tbody>";
                          while($row = mysqli_fetch_array($result))
                          {
                              $product_id = $row['product_id'];
                              $select_products = "Select * from `products` where product_id = '$product_id'";
                              $result_products = mysqli_query($con, $select_products);
                              while($row_product_price = mysqli_fetch_array($result_products))
                              {
                                $product_price = array($row_product_price['product_price']); //350    250    500 
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_img1'];
                                $product_values = array_sum($product_price);//350     250       500
                                $total += $product_values;//350         250            500

                ?>
                        <tr>
                            <td style="padding-top:35px;"><?php echo $product_title ?></td>
                            <td><img src="./Admin/product_images/<?php echo $product_image1 ?>" class="cart_img" alt="">
                            </td>
                            <td style="padding-top:15px;"><input type="text" name="qty" class="form-input mt-4 w-50"></td>
                            <?php 
                              $get_ip_add = getIPAddress();
                              if(isset($_POST['update_cart']))
                              {
                                $quantities = $_POST['qty'];
                                $update_cart = "update `cart_details` set quantity=$quantities where ip_address = '$get_ip_add'";
                                $result_quantity = mysqli_query($con, $update_cart);
                                $total = $total * $quantities;
                           
                              }
                        ?>
                            <td style="padding-top:40px;"><?php echo $price_table ?>/-</td>
                            <td style="padding-top:25px;"><input type="checkbox" class="mt-4" name="removeitem[]"
                                    value="<?php echo $product_id;?>"></td>
                            <td  style="padding-top:15px;">
                                <!-- <button class = "bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mt-4 border-0 mx-3"
                                    name="update_cart">

                                <!-- <button class = "bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                    name="remove_cart">



                            </td>
                        </tr>


                        <?php
                    }
                }
              }
              else{
                echo "<h3 class='text-center text-danger mt-3'>Cart is Empty !!</h3>";
              }
                ?>

                        </tbody>
                    </table>

                    <!-- Subtotal  -->

                    <div class="d-flex mb-3">

                        <?php
                $get_ip_add = getIPAddress();
                $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                $result = mysqli_query($con,$cart_query);
                $result_count = mysqli_num_rows($result);
                if($result_count > 0){
                  echo "<h5 class= 'px-4'>Subtotal : <strong class='text-info'> $total /-</strong></h5>
                <input type='submit' value = 'Continue Shopping' class = 'bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <button class ='bg-secondary p-3 py-2 border-0'> <a href='./UsersArea/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                }
                else{
                 echo "<input type='submit' value = 'Continue Shopping' class = 'bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
               ";
              
                }

                if(isset($_POST['continue_shopping'])){
                  echo "<script>window.open('index.php','_self')</script>";
                }
            ?>



                    </div>
            </div>
        </div>
        </form>


        <!-- function to remove item -->

        <?php
      function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart']))
        {
          foreach($_POST['removeitem'] as $remove_id)
          {
            echo $remove_id;
            $delete_query = "Delete from `cart_details` where product_id = $remove_id";
            $run_delete = mysqli_query($con, $delete_query);
            if($run_delete)
            {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }
      echo $remove_item = remove_cart_item();
    
    ?>


        <!-- last child -->'
        <br><br><br><br><br><br><Br>
        <?php
    include("./includes/footer.php");
   ?>

    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>