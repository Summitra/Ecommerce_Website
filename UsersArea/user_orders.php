<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    </link>
</head>

<body>

    <?php
            $username = $_SESSION['username'];
            $get_user = "Select * from `users_table` where username = '$username'";
            $result = mysqli_query($con, $get_user);
            $row_fetch = mysqli_fetch_assoc($result);
            $user_id = $row_fetch['user_id'];
            

        ?>

    <h4 class="text-success mt-3">All My Orders</h4>
    <table class="table table-bordered mt-5" style="width:98%">
        <thead>
            
            <?php

            $get_order_details = "Select * from `users_orders` where user_id = $user_id";
            $result_orders = mysqli_query($con,$get_order_details);
            $row_count = mysqli_num_rows($result_orders);
            if($row_count == 0)
            {
                echo "<h3 class= 'text-danger text-center  mb-5 mt-5'>No Orders Received Yet !!</h3>";
 
            }
            else{
                echo "<tr>
                <th style = 'background-color:#27d3fe;'>Sr.no</th>
                
                <th style = 'background-color:#27d3fe;'>Amount Due</th>
                <th style = 'background-color:#27d3fe;'>Total Products</th>
                <th style = 'background-color:#27d3fe;'>Invoice Number</th>
                <th style = 'background-color:#27d3fe;'>Date</th>
                <th style = 'background-color:#27d3fe;'>Complete/Incomplete</th>
                <th style = 'background-color:#27d3fe;'>Status</th>

            </tr>
        </thead>

        <tbody>";
            $number=1;
            while($row_orders = mysqli_fetch_assoc($result_orders))
            {
                $order_id= $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                if($order_status == 'pending')
                {
                    $order_status = 'Incomplete';
                }else{
                    $order_status = 'Complete';
                }
                $order_date = $row_orders['order_date'];
                
                echo "<tr>
                            <td style = 'background-color:#758594;color :white;'>$number</td>
                            <td style = 'background-color:#758594;color :white;'>$amount_due</td>
                            <td style = 'background-color:#758594;color :white;'>$total_products</td>
                            <td style = 'background-color:#758594;color :white;'>$invoice_number</td>
                            <td style = 'background-color:#758594;color :white;'>$order_date</td>
                            <td style = 'background-color:#758594;color :white;'>$order_status</td>";
                            ?>
                            <?php
                              if($order_status == 'Complete')
                              {
                                echo "<td style = 'background-color:#758594; color:white;'>Paid</td>";
                              }
                              else{
                                     echo "<td style = 'background-color:#758594; color:white;'><a href='confirm_payment.php?order_id= $order_id' class='text-light'>Confirm</a>
                                     </td>
                                     </tr>";
                              }
                           
                    $number++;
                }
           }


        ?>
        </tbody>

    </table>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>