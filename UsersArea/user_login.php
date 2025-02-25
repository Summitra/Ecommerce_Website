<?php
        include('../includes/connect.php');
        include('../Functions/common_function.php');
        @session_start(); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <style>
    body {
        background-image: url('../images/login2.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        overflow-x:hidden;
    }

    h3 {
        font-weight: bold;
        font-family: "Verdana";
    }

    </style>
</head>

<body>
    <div class="container-fluid">
        <h3 class="text-center mt-4">
            Login
        </h3>
        <div class="row d-flex align-items-center justify-content-center  mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">

                    <!-- Username Field -->
                    <div class="form-outline mb-4">
                        <b><label for="username" class="form-label">Username:</label></b>
                        <input type="text" id="username" class="form-control" placeholder="Enter Your Username"
                            autocomplete="off" required="required" name="username" />
                    </div>

                    <!-- password field-->
                    <div class="form-outline mb-4">
                        <b><label for="password" class="form-label">Password:</label></b>
                        <input type="password" id="password" class="form-control" placeholder="Enter Password" 
                            autocomplete="off" required="required" name="password" />
                    </div>


                    <div class="">
                        <input type="submit" value="Login" class="btn btn-outline-light py-2 px-3 border-0 text-dark"
                            name="login"></input>
                        <p class="small fw-bold mt-2 pt-1">Don't have an account ? <a href="user_registration.php"
                                class="text-success"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_query = "Select * from `users_table` where username = '$username'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // Cart Item
    $select_query_cart = "Select * from `cart_details` where ip_address = '$user_ip'";
    $select_cart =mysqli_query($con,$select_query_cart);
    $row_count_cart= mysqli_num_rows($select_cart);
    if($row_count>0)
    { 
        $_SESSION['username'] = $username;
         if(password_verify($password,$row_data['user_password']))
         {
            
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username'] = $username;
                echo "<script>alert('Login Successful !!')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $username;
                echo "<script>alert('Login Successful !!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }

        }else{
            echo "<script>alert('Invalid Credentials !!')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials !!')</script>";
    }

}
?>