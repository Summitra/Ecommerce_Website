<?php
    if(isset($_GET['delete_product']))
    {
        $delete_id = $_GET['delete_product'];
        // echo $delete_id;
        $delete_products = "Delete from `products` where product_id = $delete_id";
        $result_product = mysqli_query($con, $delete_products);
        if($result_product)
        {
            echo "<script>alert('Product Deleted Successfully !!')</script>";
            echo "<script>window.open('./index.php?view_products', '_self')</script>";
        }
    }
?>