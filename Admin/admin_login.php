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
    <title>Admin Login</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </link>

    <style>
        body{
            overflow-x: hidden;
        }
        .img-fluid{
            padding-right:60px;
        }
        h2 {
        font-weight: bold;
        font-family: "Verdana";
        color:rgb(49, 11, 164);
        }
        #uname{
            padding-top:60px;
        }
        #admin{
            padding-top:60px;
        }
    </style>

</head>
<body>

    <div class="container-fluid mb-4">
        <h2 class="text-center mb-3" id="admin">Admin Login</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/admin_login1.avif" alt="admin_login" class="img-fluid mt-2">
        </div>

        <div class="col-lg-6 col-xl-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-5">
                    <label for="ad_name" id="uname" class="form-label fw-bold">Username:</label>
                    <input type="text" id="ad_name" name="ad_name" placeholder="Enter your username" required = "required" class="form-control">
                </div>


                <div class="form-outline mb-4">
                    <label for="password" class="form-label fw-bold">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required = "required" class="form-control">
                </div>

                <div>
                    <b><input type="submit" class="bg-primary py-2 px-3 border-0 text-light mb-3 mt-2" name="admin_login" value="Login"> <p class="small">Don't have an account ? <a href="admin_registration.php" class="link-success">Register</a></p></b>
                </div>

            </form>
        </div>
    </div>
    </div>
    
</body>
</html>


<?php
if(isset($_POST['admin_login']))
{
    $username1 = $_POST['ad_name'];
    $password = $_POST['password'];

    $select_query = "Select * from `admin_table` where admin_name = '$username1' or admin_password = '$password'";
    $result = mysqli_query($con,$select_query);
    $row = mysqli_num_rows($result);
    $count = mysqli_fetch_assoc($result);

    if($count>=1)
    { 
        $_SESSION['ad_name'] = $username1;
                echo "<script>alert('Login Successful !!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
     }
     else
     {
        echo "<script>alert('Invalid Credentials !!')</script>";
     }
    
}

?>