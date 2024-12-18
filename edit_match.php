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
$sql = "SELECT * FROM matches WHERE id=$id";
$result = $conn->query($sql);
$match = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Match</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <h2>Edit Match</h2>
        <form action="edit_match_action.php" method="post">
            <input type="hidden" name="id" value="<?php echo $match['id']; ?>">
            <label for="match_no">Match No:</label>
            <input type="number" id="match_no" name="match_no" value="<?php echo $match['match_no']; ?>" required>
            <br>
            <label for="team_a">Team A:</label>
            <input type="text" id="team_a" name="team_a" value="<?php echo $match['team_a']; ?>" required>
            <br>
            <label for="team_b">Team B:</label>
            <input type="text" id="team_b" name="team_b" value="<?php echo $match['team_b']; ?>" required>
            <br>
            <label for="date_time">Date & Time:</label>
            <input type="datetime-local" id="date_time" name="date_time" value="<?php echo date('Y-m-d\TH:i', strtotime($match['date_time'])); ?>" required>
            <br>
            <button type="submit">Update Match</button>
        </form>
    </main>
</body>
</html>
