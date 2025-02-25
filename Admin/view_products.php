
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-5">
        <thead>
            <tr class="text-center">
                <th style = "background-color:#27d3fe;">Prouct ID</th>
                <th style = "background-color:#27d3fe;">Product Title</th>
                <th style = "background-color:#27d3fe;">Product Image</th>
                <th style = "background-color:#27d3fe;">Product Price</th>
                <th style = "background-color:#27d3fe;">Total Sold</th>
                <th style = "background-color:#27d3fe;">Status</th>
                <th style = "background-color:#27d3fe;">Edit</th>
                <th style = "background-color:#27d3fe;">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $get_products = "Select * from `products`";
                $result = mysqli_query($con, $get_products);
                $number = 0;
                while($row = mysqli_fetch_assoc($result))
                {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_image1 = $row['product_img1'];
                    $product_price = $row['product_price'];
                    $status = $row['status'];
                    $number++;
                    
             ?>
            <tr class='text-center'>
                <td style = 'background-color:#758594;color :white; padding-top : 25px;'><?php echo $number; ?></td>
                <td style = 'background-color:#758594;color :white; padding-top : 25px;'><?php echo $product_title;?></td>
                <td style = 'background-color:#758594;color :white;'><img src = './product_images/<?php echo $product_image1;?>' class='product_img'/></td>
                <td style = 'background-color:#758594;color :white; padding-top : 33px;'><?php echo $product_price; ?>/-</td>
                <td style = 'background-color:#758594;color :white; padding-top : 35px;'><?php
                
                    $get_count = "Select * from `pending_orders` where product_id = $product_id";
                    $result_count = mysqli_query($con,$get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                ?>
                </td>
                <td style = 'background-color:#758594;color :white; padding-top : 30px;'><?php echo $status; ?></td>
                <td style = 'background-color:#758594;color :white; padding-top : 30px;'><a href='index.php?edit_product=<?php echo $product_id?>' class = 'text-dark'><i class='fa-regular fa-pen-to-square' style='color: #ffffff;'></i></a></td>
                <td style = 'background-color:#758594;color :white; padding-top : 32px;'><a href='index.php?delete_product=<?php echo $product_id?>' class = 'text-dark'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
            </tr>
               
                <?php
                 }
             ?>
          
        </tbody>

    </table>
