<?php
// Replace 'your_database_host', 'your_database_name', 'your_username', and 'your_password' with your actual database credentials
$host = '127.0.0.1'; 
$username = 'root'; 
$password = '';
$db_name = 'mycampus';

// Establish the database connection
$connection = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the Flutter app sends 'email' and 'password' in the request body
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform the database query
    $stmt = $connection->prepare("SELECT * FROM registration WHERE 'Email ID' = :email AND `New Password` = :password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // If the user is found, send a success response back to Flutter
        echo json_encode(['status' => 'success', 'message' => 'Login successful', 'user' => $user]);
    } else {
        // If the user is not found, send an error response back to Flutter
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}
?>
