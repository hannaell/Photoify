<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Register</h1>

    <form action="app/users/register.php" method="post">

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input class="form-control" type="text" name="firstName" placeholder="First Name" required>
            <small class="form-text text-muted">Please provide the your first name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input class="form-control" type="text" name="lastName" placeholder="Last Name" required>
            <small class="form-text text-muted">Please provide the your last name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="userName">User Name</label>
            <input class="form-control" type="text" name="userName" placeholder="User Name" required>
            <small class="form-text text-muted">Please provide the your user name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="francis@darjeeling.com" required>
            <small class="form-text text-muted">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" required>
            <small class="form-text text-muted">Please confirm password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
