<?php require __DIR__.'/views/header.php'; ?>

<div class="login">

    <h2 class="h2Login">Login</h2>
    <div class="containerLogin">
        <form action="app/users/login-app.php" method="post">
            <div class="emailLogin">
                <label for="email">Email</label>
                <input class="inputLogin" type="email" name="email" placeholder="francis@darjeeling.com" required>
            </div><!-- /form-group -->

            <div class="passwordLogin">
                <label for="password">Password</label>
                <input class="inputLogin" type="password" name="password" required>
            </div><!-- /form-group -->

            <div class="buttonLogin">
                <button class="button" type="submit">Login</button>
            </div>

        </form>
    </div>
    <div class="createLogin">
        <p>Don't have an account?</p>
        <a href="/register.php">Create account</a>
    </div>
</div>


<?php require __DIR__.'/views/footer.php'; ?>
