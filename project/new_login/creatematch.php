<?php
// Include database connection
include '../connection/connection.php';

// Fetch clubs from the database
$sql_clubs = "SELECT * FROM clubs";
$result_clubs = $conn->query($sql_clubs);
$clubs = [];
if ($result_clubs->num_rows > 0) {
    while ($row = $result_clubs->fetch_assoc()) {
        $clubs[] = $row;
    }
}

// Handle match creation and save to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_match'])) {
    $club_1_id = $_POST['club_1_id'];
    $club_2_id = $_POST['club_2_id'];
    $match_date = $_POST['match_date'];

    if ($club_1_id == $club_2_id) {
        echo "Error: A club cannot play against itself.";
    } else {
        $sql_insert = "INSERT INTO matches (club_1_id, club_2_id, match_date)
                       VALUES ('$club_1_id', '$club_2_id', '$match_date')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Match created and saved successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Handle score update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_score'])) {
    $match_id = $_POST['match_id'];
    $club_1_score = $_POST['club_1_score'];
    $club_2_score = $_POST['club_2_score'];

    $sql_update_score = "UPDATE matches SET club_1_score = '$club_1_score', club_2_score = '$club_2_score' 
                         WHERE match_id = '$match_id'";
    if ($conn->query($sql_update_score) === TRUE) {
        echo "Scores updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle match deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_match'])) {
    $match_id = $_POST['match_id'];

    $sql_delete_match = "DELETE FROM matches WHERE match_id = '$match_id'";
    if ($conn->query($sql_delete_match) === TRUE) {
        echo "Match deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all matches for display
$sql_matches = "SELECT m.match_id, m.match_date, m.club_1_score, m.club_2_score,
                       c1.name AS club_1_name, 
                       c2.name AS club_2_name 
                FROM matches m
                JOIN clubs c1 ON m.club_1_id = c1.c_id
                JOIN clubs c2 ON m.club_2_id = c2.c_id
                ORDER BY m.match_date DESC";
$result_matches = $conn->query($sql_matches);
$matches = [];
if ($result_matches->num_rows > 0) {
    while ($row = $result_matches->fetch_assoc()) {
        $matches[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create and Manage Matches</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('stadium_background.jpg') no-repeat center center/cover;
            color: #fff;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
        }
        h1, h2 {
            text-align: center;
        }
        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        form select, form input {
            width: 45%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .match-table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }
        .match-table th, .match-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
            color: #000;
            background-color: #fff;
        }
        .score-input {
            width: 50px;
        }
        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Back Button -->
    <div class="back-button">
        <form method="GET" action="dash.php">
            <button type="submit">Back</button>
        </form>
    </div>

    <h1>Create a Match</h1>

    <!-- Match Creation Form -->
    <form method="POST">
        <select name="club_1_id" required>
            <option value="">Select Club 1</option>
            <?php foreach ($clubs as $club): ?>
                <option value="<?php echo $club['c_id']; ?>"><?php echo htmlspecialchars($club['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <select name="club_2_id" required>
            <option value="">Select Club 2</option>
            <?php foreach ($clubs as $club): ?>
                <option value="<?php echo $club['c_id']; ?>"><?php echo htmlspecialchars($club['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <input type="datetime-local" name="match_date" required>

        <button type="submit" name="create_match">Create Match</button>
    </form>

    <!-- Display Matches -->
    <h2>All Matches</h2>
    <?php if (count($matches) > 0): ?>
        <table class="match-table">
            <tr>
                <th>Match ID</th>
                <th>Match Date</th>
                <th>Club 1</th>
                <th>Club 2</th>
                <th>Score (Club 1)</th>
                <th>Score (Club 2)</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($matches as $match): ?>
                <tr>
                    <td><?php echo htmlspecialchars($match['match_id']); ?></td>
                    <td><?php echo htmlspecialchars($match['match_date']); ?></td>
                    <td><?php echo htmlspecialchars($match['club_1_name']); ?></td>
                    <td><?php echo htmlspecialchars($match['club_2_name']); ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="match_id" value="<?php echo $match['match_id']; ?>">
                            <input type="number" class="score-input" name="club_1_score" value="<?php echo htmlspecialchars($match['club_1_score']); ?>">
                    </td>
                    <td>
                            <input type="number" class="score-input" name="club_2_score" value="<?php echo htmlspecialchars($match['club_2_score']); ?>">
                    </td>
                    <td>
                            <button type="submit" name="update_score">Update</button>
                        </form>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="match_id" value="<?php echo $match['match_id']; ?>">
                            <button type="submit" name="delete_match" style="background-color: red;">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No matches found.</p>
    <?php endif; ?>
</div>

</body>
</html>
