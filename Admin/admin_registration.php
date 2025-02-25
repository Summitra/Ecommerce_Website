<?php
    include('../includes/connect.php');
    include('../Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

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
            padding-right:50px;
        }
        h2 {
        font-weight: bold;
        font-family: "Verdana";
        color:rgb(49, 11, 164);
    }
    </style>

</head>
<body>

    <div class="container-fluid mt-5 mb-4">
        <h2 class="text-center mb-5">Admin Registration</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/admin_register.jpg" alt="admin_registration" class="img-fluid mt-3">
        </div>

        <div class="col-lg-6 col-xl-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-3">
                    <label for="username1" class="form-label fw-bold">Username:</label>
                    <input type="text" id="username1" name="username1" placeholder="Enter your username" required = "required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="email" class="form-label fw-bold">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required = "required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label fw-bold">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required = "required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label fw-bold">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" required = "required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="admin_image" class="form-label fw-bold">Admin Image:</label>
                    <input type="file" id="admin_image" name="admin_image" required = "required" class="form-control">
                </div>

                <div>
                    <b><input type="submit" class="bg-success py-2 px-3 border-0 text-light mb-3 mt-2" name="admin_register" value="Register"> <p class="small">Already have an account ? <a href="admin_login.php" class="link-danger">Login</a></p></b>
                </div>

            </form>
        </div>
    </div>
    </div>
    
</body>
</html>


<!-- php code -->
<?php
if(isset($_POST['admin_register']))
{
    $username1 = $_POST['username1'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $confirm_pass = $_POST['confirm_password'];
    $image = $_FILES['admin_image']['name'];
    $tmp_image = $_FILES['admin_image']['tmp_name'];


        // Select Query

        $select_query = "Select * from `admin_table` where admin_name = '$username1' or admin_email = '$email'";
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
            move_uploaded_file($tmp_image, "./admin_images/$image");
            $insert_query = "insert into `admin_table` (admin_name, admin_email, admin_password, admin_image) values ('$username1', '$email', '$password', '$image')";
            $sql_execute = mysqli_query($con, $insert_query);
            if($sql_execute)
                {
                    echo "<script>alert('Registration Successful !!')</script>";
                    echo "<script>window.open('admin_login.php', '_self')</script>";
                }
                else{
                    die(mysqli_error($con));
                }
        }
    }