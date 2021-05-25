<?php
include('includes/admin-header.php');

if(isset($_SESSION['user_name'])){
    $user_name = $_SESSION['user_name'];

    $query = "SELECT * FROM users WHERE user_name = '{$user_name}'";
    $select_user_profile_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_image = $row['user_image'];
        $user_email = $row['user_email'];
        $user_roll = $row['user_roll'];
    }

}

if(isset($_POST['edit_user'])){


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

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname ='{$user_lastname}', ";
    $query .= "user_name ='{$user_name}', ";
    $query .= "user_roll = '{$user_roll}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE user_name = '{$user_name}' ";
    $update_query_result = mysqli_query($connection, $query);
    confirm($update_query_result);
    header("Location: users.php");
}
?>


    <div id="wrapper">

    <!-- Navigation -->
    <?php
    include('includes/admin-navigation.php');
    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_firstname">Firstname</label>
                            <input type="text" value ="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="user_lastname">LastName</label>
                            <input type="text" value ="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                        </div>

                        <div class="form-group">
                            <select name="user_roll" id="">
                                <option value="<?php echo $user_roll; ?>"><?php echo $user_roll; ?></option>
                                <?php
                                if($user_roll == 'admin'){
                                    echo "<option value='subscriber'>Subscriber</option>";
                                }else{
                                    echo " <option value='admin'>Admin</option>";
                                }
                                ?>


                            </select>
                        </div>



                        <!--    <div class="form-group">-->
                        <!--        <label for="post_image">Post image</label>-->
                        <!--        <input type="file" name="image">-->
                        <!--    </div>-->

                        <div class="form-group">
                            <label for="user_name">Username</label>
                            <input type="text" value ="<?php echo $user_name; ?>" class="form-control" name="user_name">
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" value ="<?php echo $user_email; ?>" class="form-control" name="user_email">
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" value ="<?php echo $user_password ; ?>" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php
include ('includes/admin-footer.php');
?>