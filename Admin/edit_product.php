<?php
    if(isset($_GET['edit_product']))
    {
        $eid = $_GET['edit_product'];
        $edit_data = "Select * from `products` where product_id= $eid";
        $result=mysqli_query($con,$edit_data);
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_img1'];
        $product_image2 = $row['product_img2'];
        $product_image3 = $row ['product_img3'];
        $product_price = $row['product_price'];

        // Fetching category id
        $select_category = "Select * from `categories` where category_id = $category_id";
        $result_category = mysqli_query($con, $select_category);
        $row_cat = mysqli_fetch_assoc($result_category);
        $category_title = $row_cat['category_title'];


         // Fetching brands id
         $select_brand = "Select * from `brands` where brand_id = $brand_id";
         $result_brand = mysqli_query($con, $select_brand);
         $row_brand = mysqli_fetch_assoc($result_brand);
         $brand_title = $row_brand['brand_title'];
    }
?>





<div class="container mt-5">
    <h4 class="text-center">Edit Product</h4>
    <form action="" method = "post" enctype = "multipart/form-data">
        <div class="form-outline w-50 m-auto mt-5">
            <b><label for="product_title" class="form-label">Product Title</label></b>
            <input type="text" value ="<?php echo $product_title;?>" id="product_title" name = "product_title" class="form-control" required = "required">
        </div>

        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_desc" class="form-label">Product Description</label></b>
            <input type="text" id="product_desc" value ="<?php echo $product_description;?>" name = "product_desc" class="form-control" required = "required">
        </div>

        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_keywords" class="form-label">Product Keywords</label></b>
            <input type="text" id="product_keywords" name = "product_keywords" value ="<?php echo $product_keywords;?>" class="form-control" required = "required">
        </div>

        
        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_keywords" class="form-label">Product Category</label></b>
            <select name="product_category" class = "form-select">
                <option value="<?php echo $category_title;?>"><?php echo $category_title;?></option>
            <?php
                 $select_category_all= "Select * from `categories`";
                 $result_category_all = mysqli_query($con, $select_category_all);
                while($row_cat_all = mysqli_fetch_assoc($result_category_all))
                {
                    $category_title = $row_cat_all['category_title'];
                    $category_id = $row_cat_all['category_id'];
                     echo "<option value='$category_id'>$category_title</option>";
                }
                
         
            ?>
                
                
            </select>
        </div>

        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_brands" class="form-label">Product Brands</label></b>
            <select name="product_brands" class = "form-select">
            <option value="<?php echo $brand_title;?>"><?php echo $brand_title;?></option>
          
            <?php
                 $select_brands_all= "Select * from `brands`";
                 $result_brands_all = mysqli_query($con, $select_brands_all);
                while($row_brands_all = mysqli_fetch_assoc($result_brands_all))
                {
                    $brand_title = $row_brands_all['brand_title'];
                    $brand_id = $row_brands_all['brand_id'];
                     echo "<option value='$brand_id'>$brand_title</option>";
                }
                
         
            ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_image1" class="form-label">Product Image 1</label></b>
            <div class="d-flex">
                <input type="file" id="product_image1" name = "product_image1" class="form-control w-90 m-auto" required = "required">
                <img src = "./product_images/<?php echo $product_image1;?>" alt="" class="product_img "/>
            </div>
         </div>

         
        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_image2" class="form-label">Product Image 2</label></b>
            <div class="d-flex">
                <input type="file" id="product_image2" name = "product_image2"  class="form-control w-90 m-auto" required = "required">
                <img src = "./product_images/<?php echo $product_image2;?>" alt="" class="product_img "/>
            </div>
         </div>


         
        <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_image3" class="form-label">Product Image 3</label></b>
            <div class="d-flex">
                <input type="file" id="product_image3" name = "product_image3"  class="form-control w-90 m-auto" required = "required">
                <img src = "./product_images/<?php echo $product_image3;?>" alt="" class="product_img "/>
            </div>
         </div>

         <div class="form-outline w-50 m-auto mt-4">
            <b><label for="product_price" class="form-label">Product Price</label></b>
            <input type="text" id="product_price" value="<?php echo $product_price;?>" name = "product_price" class="form-control" required = "required">
        </div>

        <div class="w-50 m-auto">
            <input type="submit" name = "edit_product" value="Update Product" class = "btn btn-info py-2 mt-4 mb-4 border-0">
        </div>

    </form>
</div>

<!-- Updating products -->

<?php
    if(isset($_POST['edit_product']))
    {
        $product_title = $_POST['product_title'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brands'];
        $product_price = $_POST['product_price'];

        
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        $tmp_image1 = $_FILES['product_image1']['tmp_name'];
        $tmp_image2 = $_FILES['product_image2']['tmp_name'];
        $tmp_image3 = $_FILES['product_image3']['tmp_name'];

        // checking fields empty or not
        if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price=='')
        {
            echo "<script>alert('Please fill all the fields !!')</script>";

        }else{
            move_uploaded_file($tmp_image1, "./product_images/$product_image1"); 
            move_uploaded_file($tmp_image2, "./product_images/$product_image2");
            move_uploaded_file($tmp_image3, "./product_images/$product_image3");
        }
       
        // update query
        $update_product = "update `products` set product_title='$product_title', product_description='$product_desc', product_keywords='$product_keywords' ,category_id = $product_category, brand_id =$product_brand, product_img1='$product_image1', product_img2='$product_image2', product_img3='$product_image3', product_price='$product_price', date=NOW() where product_id=$eid";
        $result_update = mysqli_query($con, $update_product);
        if($result_update)
        {
            echo "<script>alert('Product Updated Successfully !!')</script>";
            echo "<script>window.open('./index.php?view_products', '_self')</script>";
        }

    }
?>