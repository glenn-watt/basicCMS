<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Roll</th>


    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $select_all_users_query=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_all_users_query)){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_image = $row['user_image'];
        $user_email = $row['user_email'];
        $user_roll = $row['user_roll'];


        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_roll</td>";
//        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
//        $select_post_id=mysqli_query($connection,$query);
//        while($row = mysqli_fetch_assoc($select_post_id)) {
//            $post_title = $row['post_title'];
//            $post_id = $row['post_id'];
//
//            echo "<td><a href='../post.php?p_id=$post_id'> $post_title</a></td>";
//        }



        echo "<td><a href='users.php?change_to_admin={$user_id}'>Make Admin</a> </td>";
        echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Make Subscriber</a> </td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a> </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<?php
if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_roll = 'admin' WHERE user_id = {$the_user_id}";
    $make_admin_query = mysqli_query($connection, $query);
    confirm($make_admin_query);
    header("Location: users.php");
}

if(isset($_GET['change_to_subscriber'])){
    $the_user_id = $_GET['change_to_subscriber'];
    $query = "UPDATE users SET user_roll = 'subscriber' WHERE user_id = {$the_user_id}";
    $make_subscriber_query = mysqli_query($connection, $query);
    confirm($make_subscriber_query);
    header("Location: users.php");
}

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: users.php");
}
?>
