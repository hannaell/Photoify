<?php require __DIR__.'/views/header.php'; ?>

<!-- <article> -->
<div class="login">

    <h1><?php echo $config['title']; ?></h1>
    <h2>Login</h2>

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
<!-- </article> -->

<?php require __DIR__.'/views/footer.php'; ?>
