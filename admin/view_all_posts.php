<?php
if (isset($_REQUEST['source']) && $_REQUEST['source'] == "delete_post") {
    if (!empty(($_REQUEST['post_id']))) {
        $post = new Post();
        $post->deletePost($_REQUEST['post_id']);
        header("location: posts.php");
    } else {
        header("location: posts.php");
    }
}
?>




<table id="myTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Author</td>
            <td>Title</td>
            <td>Category</td>
            <td>Status</td>
            <td>Image</td>
            <td>Tag</td>
            <td>Comment</td>
            <td>Date</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $posts = new Post();
        $postsList = $posts->fetchAll();
        if (!empty($postsList)) {
            foreach ($postsList as $row) {
                echo "<tr>";
                echo "<td>{$row['post_id']}</td>";
                echo "<td>{$row['post_author']}</td>";
                echo "<td>{$row['post_title']}</td>";
                echo "<td>{$row['category_title']}</td>";
                echo "<td>{$row['post_status']}</td>";
                echo "<td>";
                if (!empty($row['post_image'])) {
                    echo "<img width='100' src='../{$row['post_image']}' alt='post image'>";
                }
                echo "</td>";
                echo "<td>{$row['post_tags']}</td>";
                echo "<td>{$row['post_comment_count']}</td>";
                echo "<td>{$row['post_date']}</td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$row['post_id']}'>edit</a>";
                echo "/<a href='posts.php?source=delete_post&post_id={$row['post_id']}'>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
