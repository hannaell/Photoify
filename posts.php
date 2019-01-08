<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <form action="app/posts/posts-posts.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="profilePicture">Upload photo</label>
            <img src="/app/images/<?=$_SESSION['logedin']['content']?>" alt="BILD">
            <input type="file" name="img" required>
        </div><!-- /form-group -->
        <div class="form-group">
            <label for="description">Picture description</label>
            <input class="form-control" type="text" name="content" value="Describe your photo..." required>

        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
