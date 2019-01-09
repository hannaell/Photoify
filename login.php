<?php require __DIR__.'/views/header.php'; ?>

<article class="login">
    <h1><?php echo $config['title']; ?></h1>
    <h1>Login</h1>

    <form action="app/users/login-app.php" method="post">
        <div class="emailLogin">
            <label for="email">Email</label>
            <input class="inputLogin" type="email" name="email" placeholder="francis@darjeeling.com" required>
            <small class="">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="passwordLogin">
            <label for="password">Password</label>
            <input class="inputLogin" type="password" name="password" required>
            <small class="">Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <button class="button" type="submit">Login</button>

    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
