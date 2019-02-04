<?php require __DIR__.'/views/header.php'; ?>

<div class="register">
    <h2>Create account</h2>

    <div class="registerAll">
        <form action="app/users/register-app.php" method="post">
            <div class="firstNameRegister">
                <label for="first_name">First Name</label>
                <input class="inputRegister" type="text" name="first_name" placeholder="First Name" required>
            </div>

            <div class="lastNameRegister">
                <label for="last_name">Last Name</label>
                <input class="inputRegister" type="text" name="last_name" placeholder="Last Name" required>
            </div>

            <div class="usernameRegister">
                <label for="username">User Name</label>
                <input class="inputRegister" type="text" name="username" placeholder="User Name" required>
            </div>

            <div class="emailRegister">
                <label for="email">Email</label>
                <input class="inputRegister" type="email" name="email" placeholder="mail@mail.com" required>
            </div>

            <div class="passwordRegister">
                <label for="password">Password</label>
                <input class="inputRegister" type="password" name="password" required>
            </div>

            <div class="confirmPasswordRegister">
                <label for="password">Confirm Password</label>
                <input class="inputRegister" type="password" name="confirm_password" required>
            </div>

            <div class="buttonRegister">
                <button class="button" type="submit">Create account</button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__.'/views/footer.php'; ?>
