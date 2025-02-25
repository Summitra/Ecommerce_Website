<h3 class="text-center text-success mt-4 mb-4">All Payments</h3>
<table class="table table-bordered">
    <thead class="text-center">

    <?php
        $get_payments = "Select * from `user_payments`";
        $result_payments = mysqli_query($con,$get_payments);
        $row_count = mysqli_num_rows($result_payments);
        

    if($row_count == 0)
    {
        echo "<h3 class= 'text-danger text-center  mb-5 mt-5'>No Payments Received Yet !!</h3>";
    }else{
        echo "<tr>
            <th style = 'background-color:#27d3fe;'>Sr.no</th>
            <th style = 'background-color:#27d3fe;'>Invoice Number</th>
            <th style = 'background-color:#27d3fe;'>Amount</th>
            <th style = 'background-color:#27d3fe;'>Payment Mode</th>
            <th style = 'background-color:#27d3fe;'>Order Date</th>
            <th style = 'background-color:#27d3fe;'>Delete</th>
        </tr>
    </thead>

    <tbody class='text-center'>";
        $number = 0;
        while($row_data = mysqli_fetch_assoc($result_payments)){
            $order_id = $row_data['order_id'];
            $payment_id = $row_data['payment_id'];
            $amount = $row_data['amount'];
            $invoice_number = $row_data['invoice_number'];
            $payment_mode = $row_data['payment_mode'];
            $order_date = $row_data['Date'];
            $number++;
            echo "<tr>
            <td style = 'background-color:#758594;color :white;'>$number</td>
            <td style = 'background-color:#758594;color :white;'>$invoice_number</td>
            <td style = 'background-color:#758594;color :white;'>$amount</td>
            <td style = 'background-color:#758594;color :white;'>$payment_mode</td>
            <td style = 'background-color:#758594;color :white;'>$order_date</td>
            <td style = 'background-color:#758594;color :white;'><a href='index.php?delete_payment= $payment_id;' class = 'text-dark'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
        </tr>";
        }
    }
    ?>
        
    </tbody>
</table>
<br><Br><Br><br><Br><Br>