<?php
// Start session and check login

// Include database connection
include '../connection/connection.php';

// Handle CREATE operation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $score = $_POST['score'];
    $assist = $_POST['assist'];
    $dob = $_POST['date_of_birth'];
    $nationality = $_POST['nationality'];

    $sql = "INSERT INTO players (first_name, last_name, score, assist, date_of_birth, nationality)
    VALUES ('$first_name', '$last_name', $score, $assist, '$dob', '$nationality')";

    $conn->query($sql);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // First delete dependent rows in player_club
    $sql = "DELETE FROM player_club WHERE p_id = $id";
    $conn->query($sql);

    // Then delete the player
    $sql = "DELETE FROM players WHERE p_id = $id";
    $conn->query($sql);
}


// Fetch players for display
$sql = "SELECT * FROM players";
$result = $conn->query($sql);
$players = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $players[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Players</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .player-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="player-container">
        <h2>Manage Players</h2>

        <!-- Form to Add New Player -->
        <form method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="number" name="score" placeholder="Score" required>
            <input type="number" name="assist" placeholder="Assist" required>
            <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
            <input type="text" name="nationality" placeholder="Nationality" required>
            <button type="submit" name="create">Add Player</button>
        </form>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Score</th>
                <th>Assist</th>
                <th>Date of Birth</th>
                <th>Nationality</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($players as $player): ?>
            <tr>
                <td><?php echo htmlspecialchars($player['first_name']); ?></td>
                <td><?php echo htmlspecialchars($player['last_name']); ?></td>
                <td><?php echo htmlspecialchars($player['score']); ?></td>
                <td><?php echo htmlspecialchars($player['assist']); ?></td>
                <td><?php echo htmlspecialchars($player['date_of_birth']); ?></td>
                <td><?php echo htmlspecialchars($player['nationality']); ?></td>
                <td>
                    <a href="e2.php?id=<?php echo $player['p_id']; ?>" class="btn">Edit</a>
                    <a href="?delete=<?php echo $player['p_id']; ?>" class="btn">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="dash.php" class="btn">Back</a>
    </div>
</body>
</html>
