<?php

declare(strict_types=1);

?>

<div class="navbar">
    <span class="navbarIcon">
        <a class="" href="/feed.php"><i class="far fa-newspaper"></i></a>
    </span>


    <span class="navbarIcon">
        <a class="" href="/posts.php"><i class="fas fa-camera"></i></a>
    </span>

    <span class="navbarIcon">
        <a class="" href="/profilehome.php?user_id=<?= $_SESSION['logedin']['id']?>"><i class="far fa-user"></i></a>
    </span>
</div>
