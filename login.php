<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'mycampus';

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$usn = $_POST["USN"];
$password = $_POST["NewPassword"];

// Check if user exists in the database
$sql = "SELECT * FROM registration WHERE `USN` = '$usn' AND `New Password` = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetch the user's name from the database
  $row = $result->fetch_assoc();
  $user_name = $row['Name'];

  // Start a session and store user data for profile page
  session_start();
  $_SESSION['user_name'] = $user_name;
  $_SESSION['usn'] = $usn;
  $_SESSION['branch'] = $row['Branch'];
  $_SESSION['phone_number'] = $row['Phone Number'];
  $_SESSION['email'] = $row['Email ID'];

  // Redirect to profile.php (login successful) with a success message
  header("Location: profile.php?login_success=1". urlencode($user_name));
} else {
  // Redirect to login.html with login failure message
  header("Location: login.html?login_failure=1");
}

$conn->close();
?>
