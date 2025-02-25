<h3 class="text-center text-success mt-4 mb-4">Users List </h3>
<table class="table table-bordered">
    <thead class="text-center">

    <?php
        $get_users = "Select * from `users_table`";
        $result_users = mysqli_query($con,$get_users);
        $row_count = mysqli_num_rows($result_users);
        

    if($row_count == 0)
    {
        echo "<h3 class= 'text-danger text-center  mb-5 mt-5'>No Users Received Yet !!</h3>";
    }else{
        echo "<tr>
            <th style = 'background-color:#27d3fe;'>Sr.no</th>
            <th style = 'background-color:#27d3fe;'>Username</th>
            <th style = 'background-color:#27d3fe;'>User Email</th>
            <th style = 'background-color:#27d3fe;'>User Image</th>
            <th style = 'background-color:#27d3fe;'>User Address</th>
            <th style = 'background-color:#27d3fe;'>User Mobile</th>
            <th style = 'background-color:#27d3fe;'>Delete</th>
        </tr>
    </thead>

    <tbody class='text-center'>";
        $number = 0;
        while($row_data = mysqli_fetch_assoc($result_users)){
            $user_id = $row_data['user_id'];
            $username = $row_data['username'];
            $user_email = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;
            echo "<tr>
            <td style = 'background-color:#758594;color :white; padding-top:35px;'>$number</td>
            <td style = 'background-color:#758594;color :white; padding-top:35px;'>$username</td>
            <td style = 'background-color:#758594;color :white; padding-top:35px;'>$user_email</td>
            <td style = 'background-color:#758594;color :white;'><img src='../UsersArea/User_images/$user_image' class ='product_img' alt='$username'/></td>
            <td style = 'background-color:#758594;color :white; padding-top:35px;'>$user_address</td>
            <td style = 'background-color:#758594;color :white; padding-top:35px;'>$user_mobile</td>
            <td style = 'background-color:#758594;color :white; padding-top:35px;'><a href='index.php?delete_user= $user_id;' class = 'text-dark'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
        </tr>";
        }
    }
    ?>
        
    </tbody>
</table>