<?php
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

$sql = "SELECT match_no, team_a, team_b, date_time FROM matches";
$result = $conn->query($sql);

$matches = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $matches[] = $row;
    }
}

echo json_encode(['matches' => $matches]);

$conn->close();
?>
