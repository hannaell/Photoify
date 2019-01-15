<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';

require __DIR__.'/app/posts/editposts-posts.php'

?>


<div class="editposts">
    <div class="topEditpost">
        <div class="previousEditpost">
            <a href="/feed.php">&#8249;</a>
        </div>
        <h2>Edit post</h2>
    </div>

    <img class="photoFeed" src="/app/images/<?php echo $post['content']; ?>" alt="Image">


    <form action="/editposts.php?post_id=<?= $postId?>" method="post" enctype="multipart/form-data">

        <div class="descriptionEditposts">
            <label for="description">Picture description</label>
            <input class="inputEditposts" type="text" name="description" placeholder="Describe your photo...">
        </div>

        <div class="buttonEditposts">
            <button class="button" type="submit">Save changes</button>
        </div>
    </form>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
