<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Un-approve</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $select_all_comments_query=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_all_comments_query)){
        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        $comment_post_id = $row['comment_post_id'];

        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        $select_post_id=mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_post_id)) {
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];

            echo "<td><a href='../post.php?p_id=$post_id'> $post_title</a></td>";
        }


        echo "<td>$comment_date</td>";
        echo "<td><a href='comments.php?source=edit_commnt&c_id={$comment_id}'>Approve</a> </td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Un-approve</a> </td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a> </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<?php
if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: comments.php");
}
?>
