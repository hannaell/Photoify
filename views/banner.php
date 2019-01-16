<?php

declare(strict_types=1);

?>

<div class="banner">
    <?php if (isset($_SESSION['logedin'])): ?>
        <div class="previous">
            <a href="/feed.php">&#8249;</a>
        </div>
        <h1>Photoify</h1>

        <div class="dropdownBanner">
            <button class="dropButton">
                <span class="settingsBanner">
                    <i class="fas fa-ellipsis-v"></i>
                </span>
            </button>
            <div class="dropdown-content" id="dropdownSettings">
                <a class="" href="/settings.php">Settings</a>
                <a href="/app/users/logout-app.php">Sign out</a>
            </div>
        </div>

        <?php else: ?>
            <h1 class="h1banner">Photoify</h1>
    <?php endif; ?>
</div>
<script type="text/javascript" src="assets/script/banner.js">

</script>
<?php

require __DIR__.'/footer.php';

?>
