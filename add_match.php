<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Match</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <h2>Add Match</h2>
        <form action="add_match_action.php" method="post">
            <label for="match_no">Match No:</label>
            <input type="number" id="match_no" name="match_no" required>
            <br>
            <label for="team_a">Team A:</label>
            <input type="text" id="team_a" name="team_a" required>
            <br>
            <label for="team_b">Team B:</label>
            <input type="text" id="team_b" name="team_b" required>
            <br>
            <label for="date_time">Date & Time:</label>
            <input type="datetime-local" id="date_time" name="date_time" required>
            <br>
            <button type="submit">Add Match</button>
        </form>
    </main>
</body>
</html>
