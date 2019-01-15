<?php

declare(strict_types=1);

require __DIR__.'/views/header.php'; ?>

<?php if (isset($_SESSION['logedin'])): ?>

    <article>
        <div class="uploadPosts">
            <h1>Upload photo</h1>

            <form action="app/posts/posts-posts.php" method="post" enctype="multipart/form-data">

                <div class="filePosts">
                    <img class="uploadPhoto" src="" alt="BILD">
                    <input class="inputUpload" type="file" name="img" required>
                </div><!-- /form-group -->
                <div class="descriptionPosts">
                    <label for="description">Picture description</label>
                    <input class="inputPosts" type="text" name="description" placeholder="Describe your photo...">
                </div><!-- /form-group -->

                <div class="buttonUploadpost">
                    <button class="button" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </article>

<?php else: redirect('/login.php');?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
