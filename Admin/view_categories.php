<h3 class="text-center text-success mb-4 mt-3">All Categories</h3>
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th style = "background-color:#27d3fe;">Sr.no</th>
            <th style = "background-color:#27d3fe;">Category Title</th>
            <th style = "background-color:#27d3fe;">Edit</th>
            <th style = "background-color:#27d3fe;">Delete</th>
        </tr>
    </thead>

    <tbody class="text-center">
        <?php
            $select_cat = "Select * from  `categories`";
            $result_cat = mysqli_query($con,$select_cat);
            $number=0;
            while($row = mysqli_fetch_assoc($result_cat))
            {
                $category_id = $row['category_id'];
                $category_title=$row['category_title'];
                $number++;
        
        ?>
        <tr>
            <td style = 'background-color:#758594;color :white;'><?php echo $number;?></td>
            <td style = 'background-color:#758594;color :white;'><?php echo $category_title;?></td>
                <td style = 'background-color:#758594;color :white;'><a href='index.php?edit_category=<?php echo $category_id?>' class = 'text-dark'><i class='fa-regular fa-pen-to-square' style='color: #ffffff;'></i></a></td>
                <td style = 'background-color:#758594;color :white;'><a href='index.php?delete_category=<?php echo $category_id?>' class = 'text-dark'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

