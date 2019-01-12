<nav class="">

  <ul class="">
      <li>
          <a class="" href="#"><?php echo $config['title']; ?></a>
      </li>
      <li class="">
          <?php if (isset($_SESSION['logedin'])): ?>
              <span class="homeIcon">
                  <a class="" href="/index.php"><i class="far fa-user"></i></a>
              </span>
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
