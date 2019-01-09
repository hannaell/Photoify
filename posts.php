<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Upload photo</h1>

    <form action="app/posts/posts-posts.php" method="post" enctype="multipart/form-data">

        <div class="formFilePosts">
            <label for="profilePicture">Upload photo</label>
            <img class="uploadPhoto" src="/app/images/<?=$_SESSION['logedin']['content']?>" alt="BILD">
            <input class="formFileInputPosts"type="file" name="img" required>
        </div><!-- /form-group -->
        <div class="formDescriptionPosts">
            <label for="description">Picture description</label>
            <input class="formDescriptionInputPosts" type="text" name="description" placeholder="Describe your photo..." required>

        </div><!-- /form-group -->

        <button class="button" type="submit" class="btn btn-primary">Upload</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
