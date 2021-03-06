<?php
// Always start by loading the default application setup.
require __DIR__.'/../app/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $config['title']; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/stylesheet/style.css">
    <link rel="stylesheet" href="/assets/stylesheet/banner.css">
    <link rel="stylesheet" href="/assets/stylesheet/navbar.css">
    <link rel="stylesheet" href="/assets/stylesheet/feed.css">
    <link rel="stylesheet" href="/assets/stylesheet/editposts.css">
    <link rel="stylesheet" href="/assets/stylesheet/register.css">
    <link rel="stylesheet" href="/assets/stylesheet/login.css">
    <link rel="stylesheet" href="/assets/stylesheet/uploadphoto.css">
    <link rel="stylesheet" href="/assets/stylesheet/comments.css">
    <link rel="stylesheet" href="/assets/stylesheet/profile.css">
    <link rel="stylesheet" href="/assets/stylesheet/settings.css">

</head>
<body>
    <?php
    if (isset($_SESSION['logedin'])) {
        require __DIR__.'/navbar.php';
        require __DIR__.'/banner.php';
    } else {
        require __DIR__.'/banner.php';
    }
    ?>
