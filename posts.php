<?php require __DIR__.'/views/header.php'; ?>

<?php if (isset($_SESSION['logedin'])): ?>

    <article>
        <h1>Upload photo</h1>

        <form action="app/posts/posts-posts.php" method="post" enctype="multipart/form-data">

            <div class="filePosts">
                <label for="profilePicture">Upload photo</label>
                <img class="uploadPhoto" src="/app/images/<?=$_SESSION['logedin']['content']?>" alt="BILD">
                <input class="inputPosts"type="file" name="img" required>
            </div><!-- /form-group -->
            <div class="descriptionPosts">
                <label for="description">Picture description</label>
                <input class="inputPosts" type="text" name="description" placeholder="Describe your photo...">
            </div><!-- /form-group -->

            <button class="button" type="submit">Upload</button>
        </form>
    </article>

<?php else: redirect('/login.php');?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
