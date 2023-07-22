<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="profile.css">
</head>

<body>
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
        echo '<a href="login.html">welcome</a>';
      }
      ?>
    </div>
  </header>

  <div class="container">
  <div class="profile-card">
    <h2>User Profile</h2>
    <?php
    
    if (isset($_SESSION['user_name'])) {
      $user_name = $_SESSION['user_name'];
      $usn = $_SESSION['usn'];
      $branch = $_SESSION['branch'];
      $phone_number = $_SESSION['phone_number'];
      $email = $_SESSION['email'];
      echo "<p>Name: $user_name</p>";
      echo "<p>USN: $usn</p>";
      echo "<p>Branch: $branch</p>";
      echo "<p>Phone Number: $phone_number</p>";
      echo "<p>Email ID: $email</p>";
    } else {
      echo "<p>Error: User data not found.</p>";
    }
    ?>
    <a href="index.php" class="profile-button">Home</a>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> MyCampus. All rights reserved.</p>
  </footer>
</body>

</html>
