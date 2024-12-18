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
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <h2>Dashboard</h2>
        <a href="logout.php">Logout</a>
        <h3>Manage Matches</h3>
        <table>
            <thead>
                <tr>
                    <th>Match No</th>
                    <th>Team A</th>
                    <th>Team B</th>
                    <th>Date & Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Match data will be dynamically inserted here using JavaScript -->
            </tbody>
        </table>
        <button onclick="location.href='add_match.php'">Add Match</button>
    </main>

    <script src="dashboard.js"></script>
</body>
</html>
