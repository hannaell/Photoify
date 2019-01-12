<?php require __DIR__.'/views/header.php'; ?>

<!-- <article> -->
    <div class="register">

        <h2>Create account</h2>

        <form action="app/users/register-app.php" method="post">

            <div class="firstNameRegister">
                <label for="first_name">First Name</label>
                <input class="inputRegister" type="text" name="first_name" placeholder="First Name" required>
            </div><!-- /form-group -->

            <div class="lastNameRegister">
                <label for="last_name">Last Name</label>
                <input class="inputRegister" type="text" name="last_name" placeholder="Last Name" required>
            </div><!-- /form-group -->

            <div class="usernameRegister">
                <label for="username">User Name</label>
                <input class="inputRegister" type="text" name="username" placeholder="User Name" required>
            </div><!-- /form-group -->

            <div class="emailRegister">
                <label for="email">Email</label>
                <input class="inputRegister" type="email" name="email" placeholder="francis@darjeeling.com" required>
            </div><!-- /form-group -->

            <div class="passwordRegister">
                <label for="password">Password</label>
                <input class="inputRegister" type="password" name="password" required>
            </div><!-- /form-group -->

            <div class="confirmPasswordRegister">
                <label for="password">Confirm Password</label>
                <input class="inputRegister" type="password" name="confirm_password" required>
            </div><!-- /form-group -->

            <div class="buttonRegister">
                <button class="button" type="submit">Create account</button>
            </div>
        </form>

    </div>
<!-- </article> -->

<?php require __DIR__.'/views/footer.php'; ?>
