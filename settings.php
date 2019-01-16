<?php require __DIR__.'/views/header.php'; ?>

<div class="settings">
    <h2>Settings</h2>

    <div class="profileSettings">
        <form action="app/users/settings-app.php" method="post" enctype="multipart/form-data">
            <div class="profilePictureSettings">
                <label class="labelSettings" for="profilePicture">Change profile picture</label>
                <img class="uploadPhoto pictureSettings"src="app/images/user.png" alt="BILD">
                <input class="inputUpload" id="fileUpload" type="file" name="img" required>
                <label class="fileUpload" for="fileUpload">Choose a file</label>
            </div>

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>
    </div>

    <div class="updateName">
        <form action="app/users/settings-app.php" method="post">
            <div class="firstNameSettings">
                <label class="labelSettings" for="first_name">Change first name</label>
                <input class="inputSettings" type="text" name="first_name" value="<?=$_SESSION['logedin']['first_name']?>" required>
            </div>

            <div class="lastNameSettings">
                <label class="labelSettings" for="last_name">Change last name</label>
                <input class="inputSettings" type="text" name="last_name" value="<?=$_SESSION['logedin']['last_name']?>" required>
            </div>

            <div class="usernameSettings">
                <label class="labelSettings" for="username">Change user name</label>
                <input class="inputSettings" type="text" name="username" value="<?=$_SESSION['logedin']['username']?>" required>
            </div>

            <div class="bioSettings">
                <label class="labelSettings" for="biography">Update bio</label>
                <input class="inputSettings" type="text" name="biography" value="<?=$_SESSION['logedin']['biography']?>" required>
                <small class="smallSettings">Write something about yourself.</small>
            </div>

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>
    </div>

    <div class="updateEmail">
        <form action="app/users/settings-app.php" method="post">
            <div class="emailSettings">
                <label class="labelSettings" for="email">Change email</label>
                <input class="inputSettings" type="email" name="email" value="<?=$_SESSION['logedin']['email']?>" required>
            </div>

            <div class="confirmPasswordSettings">
                <label class="labelSettings" for="password">Confirm password</label>
                <input class="inputSettings" type="password" name="password" required>
            </div>

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>
    </div>

    <div class="updatePassword">
        <form action="app/users/settings-app.php" method="post">
            <div class="changePasswordSettings">
                <label class="labelSettings" for="password">Change password</label>
                <input class="inputSettings" type="password" name="password" required>
                <small class="smallSettings">Current password</small>
                <input class="inputSettings" type="password" name="new_password" required>
                <small class="smallSettings">New password</small>
                <input class="inputSettings" type="password" name="confirm_password" required>
                <small class="smallSettings">New password</small>
            </div>

            <div class="buttonSettings">
                <button class="button" type="submit">Save changes</button>
            </div>
        </form>
    </div>

    <div class="deleteAccount">
        <form action="app/users/settings-app.php" method="post">
            <div class="deleteSettings">
                <label class="labelSettings" for="password">Delete account</label>
                <input class="inputSettings" type="password" name="password" required>
                <small class="smallSettings">Current password</small>
            </div>

            <div class="buttonSettings">
                <button class="button" type="submit">Delete account</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="assets/script/preview.js"></script>

<?php require __DIR__.'/views/footer.php'; ?>
