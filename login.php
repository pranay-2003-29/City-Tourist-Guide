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
$email = $_POST['email'];
$password = $_POST['password'];

// Check user in database
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful. Redirecting to home...";
        header("refresh:2;url=frontend.html");  // Redirect to home page after 2 seconds
    } else {
        echo "Invalid password. Please try again.";
    }
} else {
    echo "No user found with this email. Please signup.";
}

$conn->close();
?>
