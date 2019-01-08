<?php require __DIR__.'/views/header.php'; ?>

<article>

    <h1>Settings</h1>


    <form action="app/users/settings-app.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="profilePicture">Change profile picture</label>
            <img src="/app/images/<?=$_SESSION['logedin']['profile_picture']?>" alt="BILD">
            <!-- <input  type="file" name="img" required> -->
            <input type="file" name="img" required>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="app/users/settings-app.php" method="post">

        <div class="form-group">
            <label for="first_name">Change first name</label>
            <input class="form-control" type="text" name="first_name" value="<?=$_SESSION['logedin']['first_name']?>" required>
            <small class="form-text text-muted">Please provide the your first name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="last_name">Change last name</label>
            <input class="form-control" type="text" name="last_name" value="<?=$_SESSION['logedin']['last_name']?>" required>
            <small class="form-text text-muted">Please provide the your last name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="username">Change user name</label>
            <input class="form-control" type="text" name="username" value="<?=$_SESSION['logedin']['username']?>" required>
            <small class="form-text text-muted">Please provide the your user name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="biography">Update bio</label>
            <input class="form-control" type="text" name="biography" value="<?=$_SESSION['logedin']['biography']?>" required>
            <small class="form-text text-muted">Write something about yourself.</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="app/users/settings-app.php" method="post">

        <div class="form-group">
            <label for="email">Change email</label>
            <input class="form-control" type="email" name="email" value="<?=$_SESSION['logedin']['email']?>" required>
            <small class="form-text text-muted">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Confirm password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide the your current password (passphrase).</small>
        </div><!-- /form-group -->
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="app/users/settings-app.php" method="post">

        <div class="form-group">
            <label for="password">Change password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide the your current password (passphrase).</small>
            <input class="form-control" type="password" name="new_password" required>
            <small class="form-text text-muted">Please provide the your new password (passphrase).</small>
            <input class="form-control" type="password" name="confirm_password" required>
            <small class="form-text text-muted">Please provide the your new password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
