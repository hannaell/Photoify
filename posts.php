<?php

declare(strict_types=1);

require __DIR__.'/views/header.php'; ?>

<?php if (isset($_SESSION['logedin']['id'])): ?>

        <div class="uploadPosts">


            <form action="app/posts/posts-posts.php" method="post" enctype="multipart/form-data">

                <div class="filePosts">
                    <img class="uploadPhoto" src="app/images/camera.png" alt="BILD">
                    <input class="inputUpload" id="fileUpload" type="file" name="img" required>
                    <label class="fileUpload" for="fileUpload">Choose a file</label>
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


    <script type="text/javascript" src="assets/script/preview.js">

    </script>


<?php else: redirect('/login.php');?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
