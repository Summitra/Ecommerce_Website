<!-- connect file -->
<?php
    include('../includes/connect.php');
    session_start();

    if(isset($_GET['order_id']))
    {
        $order_id = $_GET['order_id'];
        $select_data = "Select * from `users_orders` where order_id = $order_id";
        $result = mysqli_query($con, $select_data);
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount = $row_fetch['amount_due'];    
    }

    if(isset($_POST['confirm_payment']))
    {
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values ($order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($con,$insert_query);
        if($result)
        {
            echo "<script>alert('Payment Successful !!')</script>";
            echo "<script>window.open('profile.php?user_orders', '_self')</script>";
        }
        $update_orders = "update `users_orders` set order_status = 'Complete' where order_id = $order_id";
        $result_order = mysqli_query($con,$update_orders);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    
    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">  </link>
    <style>
        body {
        background-image: url('../images/R1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover
    }
    h3{
        font-weight: bold;
        font-family: "Verdana";
        color:rgb(5, 108, 8);
    }
   
    </style>
  
</head>
<body>
    <h3 class = "text-center mt-5">Confirm Payment</h3>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <b><p style="padding-right: 150px;">Invoice number :</p></b>   
            <input type="text" class="form-control w-50 m-auto" name = "invoice_number" value = <?php echo $invoice_number?>>
            </div>

            <div class="form-outline my-4 text-center mb-4 w-50 m-auto">
                <!-- <label for="" style = "padding_left:2px;" class="text-dark">Amount</label> -->
                <b><p style="padding-right: 210px;">Amount :</p></b>
                <input type="text" class="form-control w-50 m-auto" name = "amount" value = <?php echo $amount;?>>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
            <b><p style="padding-right: 160px;">Payment Mode :</p></b>
                <select name="payment_mode" class="mt-3 form-select w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Net Banking</option>
                    <option>PayPal</option>
                    <option>Cash On Delivery</option>
                    <option>Pay Offline</option>
                </select>    
            </div>

<br>
            <div class="form-outline my-4 text-center mb-4 w-50 m-auto">
                <input type="submit" class = "bg-success text-light py-2 px-3 border-0" value="Confirm" name = "confirm_payment">    
            </div>
        </form>


    </div>
    
</body>
</html>