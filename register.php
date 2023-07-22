<?php
// Database connection parameters
$servername = '127.0.0.1'; // Change this to your database server
$username = 'root'; // Change this to your database username
$password = ''; // Change this to your database password
$dbname = 'mycampus'; // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate USN format (mixture of alphabets and numbers, 10 characters long)
function validate_usn($usn) {
    return preg_match('/^[A-Za-z0-9]{10}$/', $usn);
}

// Function to validate email format
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password format (minimum 6 characters, mixture of alphabets and numbers)
function validate_password($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d).{6,}$/', $password);
}

// Process user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $usn = $_POST["USN"];
    $branch = $_POST["Branch"];
    $phone = $_POST["PhoneNumber"];
    $email = $_POST["EmailID"];
    $password = $_POST["NewPassword"];
    $confirm_password = $_POST["ConfirmPassword"];

    // Additional validations
    if (preg_match('/\d/', $name)) {
        die("Name cannot contain numbers.");
    }

    if (!validate_email($email)) {
        die("Invalid Email ID format.");
    }

    if (!validate_usn($usn)) {
        die("USN must be a mixture of alphabets and numbers, 10 characters long.");
    }

    if (!validate_password($password)) {
        die("Password must be at least 6 characters long and contain a mixture of alphabets and numbers.");
    }

    if ($password !== $confirm_password) {
        die("Password and Confirm Password must match.");
    }

    // Check if the USN already exists in the database
    $query = "SELECT * FROM registration WHERE USN = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('USN already exists in the database.');</script>";
    } else {
        // Insert data into the database using prepared statements to prevent SQL injection
        $query = "INSERT INTO registration (Name, USN, Branch, `Phone Number`, `Email ID`, `New Password`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $name, $usn, $branch, $phone, $email, $password);

        if ($stmt->execute()) {
            // Redirect to home.html after successful registration
            header("Location: profile.php");
            exit;
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>
