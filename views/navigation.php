<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="/index.php">Home</a>
      </li><!-- /nav-item -->

      <li class="nav-item">
          <a class="nav-link" href="/about.php">About</a>
      </li><!-- /nav-item -->

      <li class="nav-item">
          <?php if (isset($_SESSION['logedin'])): ?>
             <a class="nav-link" href="/app/users/logout-app.php">Log Out</a>
             <?php else:  ?>
                 <a class="nav-link" href="/login.php">Log In</a>
          <?php endif; ?>
      </li><!-- /nav-item -->

      <li class="nav-item">
          <?php if (isset($_SESSION['logedin'])): ?>
             <a class="nav-link" href="/app/users/settings-app.php">Settings</a>
             <?php else:  ?>
                 <a class="nav-link" href="/register.php">Register</a>
          <?php endif; ?>
      </li><!-- /nav-item -->
  </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
