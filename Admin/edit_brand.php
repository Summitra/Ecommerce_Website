<?php
    if(isset($_GET['edit_brand']))
    {
        $edit_brand = $_GET['edit_brand'];
        // echo $edit_brand;

        $get_brands = "Select * from `brands` where brand_id=$edit_brand";
        $result = mysqli_query($con, $get_brands);
        $row = mysqli_fetch_assoc($result);
        $brand_title = $row['brand_title'];
        // echo $brand_title;

    }

    if(isset($_POST['edit_bran']))
    {
        $bran_title = $_POST['brand_title'];
        $update_query = "update `brands` set brand_title='$bran_title' where brand_id = $edit_brand";
        $result_bran = mysqli_query($con, $update_query);
        if($result_bran)
        {
            echo "<script>alert('Brand is been updated Successfully !!')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }
?>

   <h3 class="text-center text-success mt-4">Edit Brand</h4>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label fw-bold mb-4 mt-4" style="padding-right:550px;">Brand Title :</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value='<?php echo $brand_title;?>'>

        </div>

        <div class="form-outline">
            <input type="submit" name = "edit_bran" value="Update Brand" class="btn btn-info px-3 mb-4 mt-2">
        </div>
    </form>
<br><br><br>