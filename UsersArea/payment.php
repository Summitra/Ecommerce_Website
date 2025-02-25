<?php
        include('../includes/connect.php');
        include('../Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>

    <style>
        .image {
            width: 80%;
            margin :auto;
            display:block;
            border : 1px solid grey;
        }
    </style>

</head>
<body>

<!-- Php code to access user id -->
 <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `users_table` where user_ip =  '$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];

 ?>

    <div class="container">
        <h2 class="text-center text-info mt-3">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target = "_blank"><img src = "../images/Payment.jpg" class = "image" alt = ""></a>
            </div>

            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id;?>"><h3 class="text-center">Pay Offline</h3></a>
            </div>
            
        </div>
    </div>
    
</body>

     
</html>