<?php
// Database connection
$servername = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "city_db";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

// Insert user into database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful. Redirecting to home...";
    header("refresh:2;url=frontend.html");  // Redirect to home page after 2 seconds
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
