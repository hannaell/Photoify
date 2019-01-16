<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';

if (isset($_SESSION['logedin'])) {
    redirect('/feed.php');
}
else {
    redirect('/login.php');
}

require __DIR__.'/views/footer.php';

?>
