<?php
    if(isset($_POST['create_user'])){


        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_roll = $_POST['user_roll'];

//        $post_image = $_FILES['image']['name'];
//        $post_image_tmp = $_FILES['image']['tmp_name'];

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        //$post_date = date('d-m-y');


//        move_uploaded_file($post_image_tmp,"../images/$post_image");

        $query = "INSERT INTO users ";
	    $query .="(user_name, user_password, user_firstname, user_lastname, user_email, user_roll) ";
        $query .="VALUES ('$user_name', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_roll')";
        $create_user_query = mysqli_query($connection,$query);

        confirm($create_user_query);
    }
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">LastName</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_roll" id="">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>



<!--    <div class="form-group">-->
<!--        <label for="post_image">Post image</label>-->
<!--        <input type="file" name="image">-->
<!--    </div>-->

    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>
