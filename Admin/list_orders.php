<h3 class="text-center text-success mt-4 mb-4">All Orders</h3>
<table class="table table-bordered">
    <thead class="text-center">

    <?php
        $get_orders = "Select * from `users_orders`";
        $result_orders = mysqli_query($con,$get_orders);
        $row_count = mysqli_num_rows($result_orders);
        

    if($row_count == 0)
    {
        echo "<h3 class= 'text-danger text-center  mb-5 mt-5'>No Orders Pending !!</h3>";
    }else{
        echo "<tr>
            <th style = 'background-color:#27d3fe;'>Sr.no</th>
            
            <th style = 'background-color:#27d3fe;'>Due Amount</th>
            <th style = 'background-color:#27d3fe;'>Invoice Number</th>
            <th style = 'background-color:#27d3fe;'>Total Products</th>
            <th style = 'background-color:#27d3fe;'>Order Date</th>
            <th style = 'background-color:#27d3fe;'>Status</th>
            <th style = 'background-color:#27d3fe;'>Delete</th>
        </tr>
    </thead>

    <tbody class='text-center'>";
        $number = 0;
        while($row_data = mysqli_fetch_assoc($result_orders)){
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;
            echo "<tr>
            <td style = 'background-color:#758594;color :white;'>$number</td>
            <td style = 'background-color:#758594;color :white;'>$amount_due</td>
            <td style = 'background-color:#758594;color :white;'>$invoice_number</td>
            <td style = 'background-color:#758594;color :white;'>$total_products</td>
            <td style = 'background-color:#758594;color :white;'>$order_date</td>
            <td style = 'background-color:#758594;color :white;'>$order_status</td>
            <td style = 'background-color:#758594;color :white;'><a href='index.php?delete_order=$order_id;' class = 'text-dark'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
        </tr>";
        }
    }
    ?>
        
    </tbody>
</table>
<br><Br><Br><br><Br>