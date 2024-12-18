<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t20_world_cup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, role FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    header("Location: dashboard.php");
} else {
    echo "Invalid email or password.";
}

$conn->close();
?>
