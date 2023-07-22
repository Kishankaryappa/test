<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyCampus</title>
  <link rel="stylesheet" href="home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sansita&family=Work+Sans:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Header Section -->
  <header>
    <div class="logo-container">
      <h1>MyCampus</h1>
    </div>
    <div class="login-container">
      <?php
      session_start();
      // Check if the user_name query parameter exists
      if (isset($_SESSION['user_name'])) {
        $user_name = $_SESSION['user_name'];
        // Display the user's name from the query parameter
        echo '<a href="profile.php">Hello!!👋 ' . $user_name . '</a>';
      } else {
        // Display the default login / sign-up link if the user_name parameter is not set
        echo '<a href="login.html">Login / Sign Up</a>';
      }
      ?>
    </div>
  </header>
  <main>
    <section class="hero-section">
      
      <h2>Welcome to MyCampus!</h2>
      <p>Your campus, all in one place. Join us today!</p>
      
    </section>
   

    <section class="app-promotion">
      <div class="app-image-container">
        <img src="images/app.png" alt="MyCampus App">
      </div>
      <div class="app-description">
        <h3>Discover Our Mobile App</h3>
        <p>Explore our mobile app's features and stay connected with your campus community on the go.</p>
        <a href="#" class="install-button">Install Now</a>
      </div>
    </section>

    <section class="services-section">
      <div class="service">
        <div class="service-image">
          <img src="images/stationaries.jpg" alt="Service 1">
        </div>
        <h3>Stationary</h3>
        <p>Lets Break the Crowed</p>
      </div>
      <div class="service">
        <div class="service-image">
          <img src="images/xerox.jpg" alt="Service 2">
        </div>
        <h3>Xerox</h3>
        <p>Coming Soon...</p>
      </div>
    </section>

    <section class="feedback-section">
      <a href="feedback.php" class="feedback-button">Give FeedBack</a>
    </section>
  </main>
  <footer>
    <p>© 2023 MyCampus. All rights reserved.</p>
  </footer>
  <script>
  </script>
</body>
</html>
