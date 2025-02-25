<h3 class="text-center text-success mb-4 mt-3">All Brands</h3>
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th style = "background-color:#27d3fe;">Sr.no</th>
            <th style = "background-color:#27d3fe;">Brand Title</th>
            <th style = "background-color:#27d3fe;">Edit</th>
            <th style = "background-color:#27d3fe;">Delete</th>
        </tr>
    </thead>

    <tbody class="text-center">
        <?php
            $select_brand = "Select * from  `brands`";
            $result_brand = mysqli_query($con,$select_brand);
            $number=0;
            while($row = mysqli_fetch_assoc($result_brand))
            {
                $brand_id = $row['brand_id'];
                $brand_title=$row['brand_title'];
                $number++;
        
        ?>
        <tr>
            <td style = 'background-color:#758594;color :white;'><?php echo $number;?></td>
            <td style = 'background-color:#758594;color :white;'><?php echo $brand_title;?></td>
                <td style = 'background-color:#758594;color :white;'><a href='index.php?edit_brand=<?php echo $brand_id?>' class = 'text-dark'><i class='fa-regular fa-pen-to-square' style='color: #ffffff;'></i></a></td>
                <td style = 'background-color:#758594;color :white;'><a href='index.php?delete_brand=<?php echo $brand_id?>' type="button" class="text-dark"><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>


<!-- Modal
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h6>Are you sure you want to delete this ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_brands' class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id;?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div> -->