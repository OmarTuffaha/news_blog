<?php
if (isset($_REQUEST['add_post'])) {
    $newPost = new Post();
    $newPost->setTitle($_POST['title']);
    $newPost->setCategory($_POST['category']);
    $newPost->setAuthor($_POST['author']);
    $newPost->setStatus($_POST['post_status']);
    if (!empty($_FILES['image']['name'])) {
        $newPost->setImage_name($_FILES['image']['name']);
        $newPost->setImage_content($_FILES['image']['tmp_name']);
    }
    $newPost->setTags($_POST['tags']);
    $newPost->setContent($_POST['content']);
    $newPost->createPost();
    header("location: posts.php");
} else {
    include_once '../includes/Category.php';
    $category = new Category();
    $categoryList = $category->fetchAll();
}
?>
<form method="POST" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Title</label>
        <input class="form-control" name="title" id="post_title" type="text">
    </div>
    <div class="form-group">
        <label for="post_category">Category</label><br>
        <select name="category">
            <?php
            if (!empty($categoryList)) {
                foreach ($categoryList as $row) {
                    echo "<option value='{$row['category_id']}'>{$row['category_title']}</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input class="form-control" name="author" id="post_author" type="text">
    </div>
    <div class="form-group">
        <label for="post_status">Status</label>
        <input class="form-control" name="status" id="post_sttus" type="text">
    </div>
    <div class="form-group">
        <label for="post_status">Status</label><br>
        <select name="post_status" id="post_status">
            <option value='draft'>draft</option>
            <option value='published'>Published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Image</label>
        <input class="form-control" name="image" id="post_image" type="file">
    </div>
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input class="form-control" name="tags" id="post_tags" type="text">
    </div>
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" name="content" id="post_content" rows="10" cols="30"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" name="add_post" value="publish" id="" type="submit">
    </div>


</form>
