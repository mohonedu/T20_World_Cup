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

$id = $_POST['id'];
$match_no = $_POST['match_no'];
$team_a = $_POST['team_a'];
$team_b = $_POST['team_b'];
$date_time = $_POST['date_time'];

$sql = "UPDATE matches SET match_no='$match_no', team_a='$team_a', team_b='$team_b', date_time='$date_time' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
