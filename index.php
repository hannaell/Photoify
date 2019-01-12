<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>

    <?php if (isset(($_SESSION['logedin']))): ?>
        <h2><?php echo$_SESSION['logedin']['username']; ?></h2>
        <img class="profilePictureHome" src="/app/images/<?=$_SESSION['logedin']['profile_picture']?>" alt="BILD">
        <h4><?php echo $_SESSION['logedin']['biography']; ?></h4>
    <?php endif; ?>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
