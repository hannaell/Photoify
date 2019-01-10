<?php require __DIR__.'/views/header.php';

require __DIR__.'/app/posts/editposts-posts.php'

?>

<img class="photoFeed" src="/app/images/<?php echo $post['content']; ?>" alt="Image">

<p>Edit post</p>
<form action="/editposts.php?post_id=<?= $postId?>" method="post" enctype="multipart/form-data">

    <div class="descriptionEditposts">
        <label for="description">Picture description</label>
        <input class="inputEditposts" type="text" name="description" placeholder="Describe your photo...">
    </div><!-- /form-group -->

    <div class="buttonPosts">
        <button class="button" type="submit">Save changes</button>
    </div>
</form>

<form action="/editposts.php?post_id=<?= $postId?>" method="post" enctype="multipart/form-data">
    <div class="buttonPosts">
        <button class="button" type="submit" name="delete">Delete post</button>
    </div>
</form>

<?php require __DIR__.'/views/footer.php'; ?>
