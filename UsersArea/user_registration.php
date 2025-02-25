<?php
    include('../includes/connect.php');
    include('../Functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <style>
    body {
        background-image: url('../images/R1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover
    }

    h3 {
        font-weight: bold;
        font-family: "Verdana";
        color: #056608;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h3 class="text-center mt-4">
            Registration
        </h3>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- Username Field -->
                    <div class="form-outline mb-4">
                        <b><label for="username" class="form-label">Username:</label></b>
                        <input type="text" id="username" class="form-control" placeholder="Enter Your Username"
                            autocomplete="off" required="required" name="username" />
                    </div>

                    <!-- Email field-->
                    <div class="form-outline mb-4">
                        <b> <label for="email" class="form-label">Email:</label></b>
                        <input type="email" id="email" class="form-control" placeholder="Enter Your Email"
                            autocomplete="off" required="required" name="email" />
                    </div>

                    <!-- Image field-->
                    <div class="form-outline mb-4">
                        <b> <label for="image" class="form-label">User Image:</label></b>
                        <input type="file" id="image" class="form-control" required="required" name="image" />
                    </div>

                    <!-- password field-->
                    <div class="form-outline mb-4">
                        <b><label for="password" class="form-label">Password:</label></b>
                        <input type="password" id="password" class="form-control" placeholder="Enter Password"
                            autocomplete="off" required="required" name="password" />
                    </div>

                    <!-- confirm password field-->
                    <div class="form-outline mb-4">
                        <b><label for="confirm_password" class="form-label">Confirm Password:</label></b>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password"
                            autocomplete="off" required="required" name="confirm_password" />
                    </div>

                    <!-- Address Field -->
                    <div class="form-outline mb-4">
                        <b><label for="address" class="form-label">Address:</label></b>
                        <input type="text" id="address" class="form-control" placeholder="Enter Your Address"
                            autocomplete="off" required="required" name="address" />
                    </div>

                    <!-- Contact Field -->
                    <div class="form-outline mb-4">
                        <b><label for="contact" class="form-label">Contact No:</label></b>
                        <input type="text" id="contact" class="form-control" placeholder="Enter Your Mobile No."
                            autocomplete="off" required="required" name="contact" />
                    </div>

                    <div class="">
                        <input type="submit" value="Register" class="bg-success py-2 px-3 border-0 text-light"
                            name="register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account ? <a href="user_login.php"
                                class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<!-- php code -->
<?php
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $confirm_pass = $_POST['confirm_password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
     $user_ip = getIPAddress();

        // Select Query

        $select_query = "Select * from `users_table` where username = '$username' or user_email = '$email'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
         if($rows_count>0)
         {
            echo "<script>alert('Username & Email Already Exists !!')</script>";
        }else if($password!=$confirm_pass){
            echo "<script>alert('Password isn't matching !!')</script>";
        }
         else
         {
            // insert query
            move_uploaded_file($tmp_image, "./User_images/$image");
            $insert_query = "insert into `users_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$username', '$email', '$hash_password', '$image', '$user_ip', '$address', '$contact')";
            $sql_execute = mysqli_query($con, $insert_query);
            if($sql_execute)
                {
                    echo "<script>alert('Data inserted Successfully !!')</script>";
                }
                else{
                    die(mysqli_error($con));
                }
        }

        // Selecting cart items
        $select_cart_items = "Select * from `cart_details` where ip_address = '$user_ip'";
        $result_cart = mysqli_query($con,$select_cart_items);
        $rows_count = mysqli_num_rows($result_cart);
        if($rows_count>0)
        {
            $_SESSION['username'] = $username;
          echo  "<script>alert('You have items in your cart.')</script>";
          echo "<script>window.open('checkout.php','_self')</script>";
        }
        else{
            echo "<script>window.open('./user_login.php', '_self')</script>";
        }
    }

?>