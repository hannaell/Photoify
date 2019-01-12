<?php require __DIR__.'/views/header.php'; ?>

<article>
    <div class="settings">

        <a class="" href="/app/users/logout-app.php">Log Out</a>

        <h1>Settings</h1>


        <form action="app/users/settings-app.php" method="post" enctype="multipart/form-data">

            <div class="profilePictureSettings">
                <label class="labelSettings" for="profilePicture">Change profile picture</label>
                <img class="pictureSettings"src="/app/images/<?=$_SESSION['logedin']['profile_picture']?>" alt="BILD">
                <input class="inputUpload" type="file" name="img" required>
            </div><!-- /form-group -->

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>

        <form action="app/users/settings-app.php" method="post">

            <div class="firstNameSettings">
                <label class="labelSettings" for="first_name">Change first name</label>
                <input class="inputSettings" type="text" name="first_name" value="<?=$_SESSION['logedin']['first_name']?>" required>
            </div><!-- /form-group -->

            <div class="lastNameSettings">
                <label class="labelSettings" for="last_name">Change last name</label>
                <input class="inputSettings" type="text" name="last_name" value="<?=$_SESSION['logedin']['last_name']?>" required>

            </div><!-- /form-group -->

            <div class="usernameSettings">
                <label class="labelSettings" for="username">Change user name</label>
                <input class="inputSettings" type="text" name="username" value="<?=$_SESSION['logedin']['username']?>" required>

            </div><!-- /form-group -->

            <div class="bioSettings">
                <label class="labelSettings" for="biography">Update bio</label>
                <input class="inputSettings" type="text" name="biography" value="<?=$_SESSION['logedin']['biography']?>" required>
                <small class="smallSettings">Write something about yourself.</small>
            </div><!-- /form-group -->

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>

        <form action="app/users/settings-app.php" method="post">

            <div class="emailSettings">
                <label class="labelSettings" for="email">Change email</label>
                <input class="inputSettings" type="email" name="email" value="<?=$_SESSION['logedin']['email']?>" required>
            </div><!-- /form-group -->

            <div class="confirmPasswordSettings">
                <label class="labelSettings" for="password">Confirm password</label>
                <input class="inputSettings" type="password" name="password" required>
            </div><!-- /form-group -->

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>

        <form action="app/users/settings-app.php" method="post">

            <div class="changePasswordSettings">
                <label class="labelSettings" for="password">Change password</label>
                <input class="inputSettings" type="password" name="password" required>
                <small class="smallSettings">Please provide the your current password (passphrase).</small>
                <input class="inputSettings" type="password" name="new_password" required>
                <small class="smallSettings">Please provide the your new password (passphrase).</small>
                <input class="inputSettings" type="password" name="confirm_password" required>
                <small class="smallSettings">Please provide the your new password (passphrase).</small>
            </div><!-- /form-group -->

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>

        <form action="app/users/settings-app.php" method="post">

            <div class="deleteSettings">
                <label class="labelSettings" for="password">Delete account</label>
                <input class="inputSettings" type="password" name="password" required>
                <small class="smallSettings">Please provide the your current password (passphrase).</small>
            </div><!-- /form-group -->

            <div class="buttonSettings">
                <button class="button" type="submit">Delete account</button>
            </div>
        </form>
    </div>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
