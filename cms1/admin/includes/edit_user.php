<?php 


if(isset($_GET['edit_user'])) {
    
    $the_user_id = $_GET['edit_user'];
    
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";

    $select_users_query = mysqli_query($connection, $query);


    while( $row = mysqli_fetch_assoc($select_users_query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

    }
                         
}

if(isset($_POST['edit_user'])) {
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
//    $post_date = date('d-m-y');
  
    
//    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "SELECT randsalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if(!$select_randsalt_query) {
        
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randsalt'];
    $hashed_password = crypt($user_password, $salt); 
    
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}' ";
   // $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE user_id = {$the_user_id}";
    
    $edit_user_query = mysqli_query($connection,$query);
    
    confirmQuery($edit_user_query);
    
    echo "User Updated "."<a href='users.php'>View Users</a>";
}


?>
   

   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="firstname">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
        
    </div>
    
     <div class="form-group">
        
        <label for="lastname">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
        
    </div>
    
     <div class="form-group">
        
        <select name="user_role">
        
         <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
        
        <?php 
            
            if($user_role == 'admin')
                echo "<option value='subscriber'>subscriber</option>";
                
                else
                    
                    
            echo "<option value='admin'>admin</option>";
            
            
            ?>
        
        </select>
    </div>
    
    
     
    
     <div class="form-group">
        
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
        
    </div>
    
<!--
     <div class="form-group">
        
<label for="post_image">Post </label>
        <input type="file" name="image">
        
    </div>
-->
    
     <div class="form-group">
        
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
        
    </div>
    
     <div class="form-group">
        
        <label for="password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
        
    </div>
    
    <div class="form-group">
        
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>

    
    
</form>