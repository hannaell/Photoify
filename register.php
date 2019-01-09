<?php require __DIR__.'/views/header.php'; ?>

<article>
    <div class="register">

        <h1>Register</h1>

        <form action="app/users/register-app.php" method="post">

            <div class="firstNameRegister">
                <label for="first_name">First Name</label>
                <input class="inputRegister" type="text" name="first_name" placeholder="First Name" required>
                <small class="">Please provide the your first name.</small>
            </div><!-- /form-group -->

            <div class="lastNameRegister">
                <label for="last_name">Last Name</label>
                <input class="inputRegister" type="text" name="last_name" placeholder="Last Name" required>
                <small class="">Please provide the your last name.</small>
            </div><!-- /form-group -->

            <div class="usernameRegister">
                <label for="username">User Name</label>
                <input class="inputRegister" type="text" name="username" placeholder="User Name" required>
                <small class="">Please provide the your user name.</small>
            </div><!-- /form-group -->

            <div class="emailRegister">
                <label for="email">Email</label>
                <input class="inputRegister" type="email" name="email" placeholder="francis@darjeeling.com" required>
                <small class="">Please provide the your email address.</small>
            </div><!-- /form-group -->

            <div class="passwordRegister">
                <label for="password">Password</label>
                <input class="inputRegister" type="password" name="password" required>
                <small class="">Please provide the your password (passphrase).</small>
            </div><!-- /form-group -->

            <div class="confirmPasswordRegister">
                <label for="password">Confirm Password</label>
                <input class="inputRegister" type="password" name="confirm_password" required>
                <small class="">Please confirm password (passphrase).</small>
            </div><!-- /form-group -->

            <button class="button" type="submit">Register</button>
        </form>

    </div>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
