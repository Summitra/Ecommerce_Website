<?php
//  including connect file
    // include('./includes/connect.php');


    // getting products
    function getproducts()
    {
        global $con;

        // condition to check isset or not
            if(!isset($_GET['category']))
            {
                if(!isset($_GET['brand']))
                {

                                $select_query = "Select * from `products` order by rand() LIMIT 0,9";
                                $result_query = mysqli_query($con, $select_query);
                        //  $row = mysqli_fetch_assoc($result_query);
                        //  echo $row['product_title']; 
                        while($row = mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_img1']; 
                            $product_price = $row['product_price'];
                            $category_id = $row['category_id'];
                            $brand_id = $row['brand_id'];

                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'><b>Price :</b> $product_price/-</p>

                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
                  }      
                } 
            }
    }


    // getting all products
    function get_all_products()
    {
        global $con;

        // condition to check isset or not
            if(!isset($_GET['category']))
            {
                if(!isset($_GET['brand']))
                {

                                $select_query = "Select * from `products` order by rand()";
                                $result_query = mysqli_query($con, $select_query);
                        //  $row = mysqi_fetch_assoc($result_query);
                        //  echo $row['product_title']; 
                        while($row = mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_img1'];
                            $product_price = $row['product_price'];
                            $category_id = $row['category_id'];
                            $brand_id = $row['brand_id'];

                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                     <p class='card-text'><b>Price : </b>$product_price/-</p>
                                     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
                  }      
                } 
            }
    }

    // getting unique categories
    function get_unique_categories()
    {
        global $con;

        // condition to check isset or not
            if(isset($_GET['category']))
            {
                $category_id = $_GET['category'];

                                $select_query = "Select * from `products` where category_id = $category_id";
                                $result_query = mysqli_query($con, $select_query);
                                $num_of_rows = mysqli_num_rows($result_query);
                                if($num_of_rows == 0)
                                {
                                    echo "<h4 class = 'text-center text-danger p-4'> No stock for this category</h4>";
                                }
                            while($row = mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_img1'];
                            $product_price = $row['product_price'];
                            $category_id = $row['category_id'];
                            $brand_id = $row['brand_id'];

                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                     <p class='card-text'><b>Price :</b> $product_price/-</p>
                                     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
                  }      
                } 
            }



            // getting unique brands
        function get_unique_brands()
        {
            global $con;

        // condition to check isset or not
            if(isset($_GET['brand']))
            {
                $brand_id = $_GET['brand'];

                                $select_query = "Select * from `products` where brand_id = $brand_id";
                                $result_query = mysqli_query($con, $select_query);
                                $num_of_rows = mysqli_num_rows($result_query);
                                if($num_of_rows == 0)
                                {
                                    echo "<h4 class = 'text-center text-danger p-4'>This brand is not available for service.</h4>";
                                }
                            while($row = mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_img1'];
                            $product_price = $row['product_price'];
                            $category_id = $row['category_id'];
                            $brand_id = $row['brand_id'];

                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                     <p class='card-text'><b>Price :</b>$product_price/-</p>
                                     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                    
                                </div>
                        </div>
                    </div>";
                  }      
                } 
            }


    // displaying brands in sidenav

    function getbrands()
    {
        global $con;
        $select_brands = "Select * from `brands`";
        $result_brands = mysqli_query($con, $select_brands);
        while($row_data = mysqli_fetch_assoc($result_brands))
        {
            $brand_title= $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='nav-item'>
              <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
          </li>";
        }
    }

    // displaying categories in sidenav

    function getcategories()
    {
        global $con;
        $select_categories = "Select * from `categories`";
                    $result_categories = mysqli_query($con, $select_categories);
                    while($row_data = mysqli_fetch_assoc($result_categories))
                    {
                        $category_title= $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo "<li class='nav-item'>
                          <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                      </li>";
                    }

    }

    // searaching products
    function search_product()
    {
        global $con;
        if(isset($_GET['search_data_product']))
        {
          $search_data_value = $_GET['search_data'];
         $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
                        $num_of_rows = mysqli_num_rows($result_query);
                                if($num_of_rows == 0)
                                {
                                    echo "<h4 class = 'text-center text-danger p-4'>No results match. No products found on this category !!</h4>";
                                }
                        while($row = mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_img1'];
                            $product_price = $row['product_price'];
                            $category_id = $row['category_id'];
                            $brand_id = $row['brand_id'];

                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                     <p class='card-text'><b>Price :</b> $product_price/-</p>
                                     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
                  
         
                }
    
    
            }   
        }


        // View Details function

        function view_details()
        {
            global $con;

        // condition to check isset or not
        if(isset($_GET['product_id']))
        {
            if(!isset($_GET['category']))
            {
                if(!isset($_GET['brand']))
                {
                    $product_id = $_GET['product_id'];

                                $select_query = "Select * from `products` where product_id = $product_id";
                                $result_query = mysqli_query($con, $select_query);
                    
                        while($row = mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title']; 
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_img1'];
                            $product_image2 = $row['product_img2'];
                            $product_image3 = $row['product_img3'];
                            $product_price = $row['product_price'];
                            $category_id = $row['category_id'];
                            $brand_id = $row['brand_id'];

                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                     <p class='card-text'><b>Price :</b> $product_price/-</p>
                                     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    <a href='index.php' class='btn btn-secondary'>Go Home </a>
                                </div>
                        </div>
                    </div>
                    
                     <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class = 'text-center text-info mb-5'>Related Products</h4>
                            </div>

                            <div class='col-md-6'>
                                <img src='./Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>

                            <div class='col-md-6'>
                                <img src='./Admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                     </div>
                </div>";
                  }      
                } 
            }
        }
        }


        // get Ip address function

        function getIPAddress() {  
            //whether ip is from the share internet  
             if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
             }  
        //whether ip is from the remote address  
            else{  
                     $ip = $_SERVER['REMOTE_ADDR'];  
             }  
             return $ip;  
        }  
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip;  



        // CART FUNCTION
        function cart(){
            if(isset($_GET['add_to_cart'])){
                global $con;
                $get_ip_add = getIPAddress();
                $get_product_id = $_GET['add_to_cart'];
                $select_query = "Select * from `cart_details` where ip_address = '$get_ip_add' and product_id = $get_product_id";
                $result_query = mysqli_query($con, $select_query);
                $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows>0)
                    {
                        echo "<script>alert('This item is already present inside cart !!')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    else{
                        $insert_query = "insert into `cart_details` (product_id, ip_address,quantity) values ($get_product_id, '$get_ip_add', 0)"; 
                        $result_query = mysqli_query($con, $insert_query);
                        echo "<script>alert('Item is Added to cart !!')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    }

            }
        }

        function cart_item()
        {
            if(isset($_GET['add_to_cart'])){
                global $con;
                $get_ip_add = getIPAddress();
                $select_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                $result_query = mysqli_query($con, $select_query);
                $count_cart_items = mysqli_num_rows($result_query);

            } 
            else
              {
                global $con;
                $get_ip_add = getIPAddress();
                $select_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                $result_query = mysqli_query($con, $select_query);
                $count_cart_items = mysqli_num_rows($result_query);

              }
              echo $count_cart_items;
        }

        // Total price function

        function total_cart_price()
        {
            global $con;
            $get_ip_add = getIPAddress();
            $total = 0;
            $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
            $result = mysqli_query($con,$cart_query);
            while($row = mysqli_fetch_array($result))
            {
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id = '$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while($row_product_price = mysqli_fetch_array($result_products))
                {
                    $product_price = array($row_product_price['product_price']); //350    250    500 
                    $product_values = array_sum($product_price);//350     250       500
                    $total += $product_values;//350         250            500
                }
            }
            echo $total; 
        }




        // get user order details

        function get_user_order_details()
        {
            global $con;
            $username = $_SESSION['username'];
            $get_details = "Select * from `users_table` where username = '$username'";
            $result_query = mysqli_query($con, $get_details);
            while($row_query = mysqli_fetch_array($result_query))
            {
                $user_id = $row_query['user_id'];
                if(!isset($_GET['edit_account'])){
                    
                    if(!isset($_GET['user_orders']))
                    {
                        if(!isset($_GET['delete_account']))
                        {
                            $get_orders = "Select * from `users_orders` where user_id = $user_id and order_status ='pending'";
                            $result_orders_query = mysqli_query($con, $get_orders);
                            $row_count = mysqli_num_rows($result_orders_query);
                            if($row_count>0)
                            {
                                echo "<h4  class='text-center text-success mt-5 mb-4'>You have <span class = 'text-danger'>$row_count</span> pending orders !!</h4>
                               <p><a href='profile.php?user_orders' class='text-center text-dark'>Order Details</a></p>";
                            }else{
                                echo "<h4 class='text-center text-success mt-5 mb-4'>You have <span class = 'text-danger'>zero</span> pending orders !!</h4>
                               <p><a href='../index.php' class='text-center text-dark'>Explore Products</a></p>";
                           

                            }
                        }
                    }
                }
            }

        }

?>