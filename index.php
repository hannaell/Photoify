<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
    <?php if (isset(($_SESSION['logedin']))): ?>
        <h2><?php echo 'Welcome, ' . $_SESSION['logedin']['first_name'] . ' ' . $_SESSION['logedin']['last_name'] .'!'; ?></h2>
        <img class="profilePictureHome" src="/app/images/<?=$_SESSION['logedin']['profile_picture']?>" alt="BILD">
        <h4><?php echo $_SESSION['logedin']['biography']; ?></h4>
    <?php endif; ?>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
