<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

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

$id = $_GET['id'];
$sql = "DELETE FROM matches WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
