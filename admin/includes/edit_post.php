<?php
if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_post_by_id = mysqli_query($connection, $query);
    confirm($select_post_by_id);
    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }

    if(isset($_POST['update_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];


        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_image)){
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_category_id ='{$post_category_id}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_date = now(), ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_title = '{$post_title}' ";
        $query .= "WHERE post_id = {$the_post_id}";
        $update_query_result = mysqli_query($connection, $query);
        confirm($update_query_result);
        header("Location: posts.php");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title;?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category Id</label>
<!--        <input value="--><?php //echo $post_category_id;?><!--" type="text" class="form-control" name="post_category_id">-->
        <select name="post_category_id" id="post_category_id">
        <?php
        $query = "SELECT * FROM categories";
        $select_all_categories_query=mysqli_query($connection,$query);
        confirm($select_all_categories_query);
        while($row = mysqli_fetch_assoc($select_all_categories_query)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
        
        ?>
            <option value=""></option>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author;?>" type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status;?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post image</label>
        <input type="file" name="image">
        <img width="100" src="../images/<?php echo $post_image;?>" >
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
            <?php echo $post_content;?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>

</form>