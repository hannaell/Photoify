<nav class="">
  <a class="" href="#"><?php echo $config['title']; ?></a>

  <ul class="">
      <li class="">
          <?php if (isset($_SESSION['logedin'])): ?>
              <a class="" href="/index.php">Home</a>
          <?php endif; ?>
      </li><!-- /nav-item -->

      <li class="">
          <?php if (isset($_SESSION['logedin'])): ?>
              <a class="" href="/posts.php">Upload photo</a>
          <?php endif; ?>
      </li><!-- /nav-item -->

      <li class="">
          <?php if (isset($_SESSION['logedin'])): ?>
              <a class="" href="/feed.php">News Feed</a>
          <?php endif; ?>
      </li><!-- /nav-item -->

      <li class="">
          <?php if (isset($_SESSION['logedin'])): ?>
             <a class="" href="/app/users/logout-app.php">Log Out</a>
             <?php else:  ?>
                 <a class="" href="/login.php">Log In</a>
          <?php endif; ?>
      </li><!-- /nav-item -->

      <li class="">
          <?php if (isset($_SESSION['logedin'])): ?>
             <a class="" href="/settings.php">Settings</a>
             <?php else:  ?>
                 <a class="" href="/register.php">Register</a>
          <?php endif; ?>
      </li><!-- /nav-item -->
  </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
