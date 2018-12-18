<?php require __DIR__.'/views/header.php'; ?>

<article>
    <?php if (isset(($_SESSION['logedin']))): ?>
        <h2><?php echo 'Welcome, ' . $_SESSION['logedin']['first_name'] . '!'; ?></h2>
    <?php endif; ?>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
