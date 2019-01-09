<?php require __DIR__.'/views/header.php'; ?>

<article>

    <h1>Settings</h1>


    <form action="app/users/settings-app.php" method="post" enctype="multipart/form-data">

        <div class="profilePictureSettings">
            <label for="profilePicture">Change profile picture</label>
            <img src="/app/images/<?=$_SESSION['logedin']['profile_picture']?>" alt="BILD">
            <!-- <input  type="file" name="img" required> -->
            <input class="inputSettings" type="file" name="img" required>
        </div><!-- /form-group -->

        <button class="button" type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="app/users/settings-app.php" method="post">

        <div class="firstNameSettings">
            <label for="first_name">Change first name</label>
            <input class="inputSettings" type="text" name="first_name" value="<?=$_SESSION['logedin']['first_name']?>" required>
            <small class="">Please provide the your first name.</small>
        </div><!-- /form-group -->

        <div class="lastNameSettings">
            <label for="last_name">Change last name</label>
            <input class="inputSettings" type="text" name="last_name" value="<?=$_SESSION['logedin']['last_name']?>" required>
            <small class="">Please provide the your last name.</small>
        </div><!-- /form-group -->

        <div class="usernameSettings">
            <label for="username">Change user name</label>
            <input class="inputSettings" type="text" name="username" value="<?=$_SESSION['logedin']['username']?>" required>
            <small class="">Please provide the your user name.</small>
        </div><!-- /form-group -->

        <div class="bioSettings">
            <label for="biography">Update bio</label>
            <input class="inputSettings" type="text" name="biography" value="<?=$_SESSION['logedin']['biography']?>" required>
            <small class="">Write something about yourself.</small>
        </div><!-- /form-group -->

        <button class="button" type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="app/users/settings-app.php" method="post">

        <div class="emailSettings">
            <label for="email">Change email</label>
            <input class="inputSettings" type="email" name="email" value="<?=$_SESSION['logedin']['email']?>" required>
            <small class="">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="confirmPasswordSettings">
            <label for="password">Confirm password</label>
            <input class="inputSettings" type="password" name="password" required>
            <small class="">Please provide the your current password (passphrase).</small>
        </div><!-- /form-group -->
        <button class="button" type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="app/users/settings-app.php" method="post">

        <div class="changePasswordSettings">
            <label for="password">Change password</label>
            <input class="inputSettings" type="password" name="password" required>
            <small class="">Please provide the your current password (passphrase).</small>
            <input class="inputSettings" type="password" name="new_password" required>
            <small class="">Please provide the your new password (passphrase).</small>
            <input class="inputSettings" type="password" name="confirm_password" required>
            <small class="">Please provide the your new password (passphrase).</small>
        </div><!-- /form-group -->

        <button class="button" type="submit" class="btn btn-primary">Save changes</button>
    </form>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
