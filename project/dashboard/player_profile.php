<?php
// Start session
session_start();

// Ensure the user is authenticated

// Include database connection
include '../connection/connection.php';

// Initialize variables
$search = "";
$players = [];

// Query to fetch players
if (isset($_POST['search']) && !empty($_POST['search'])) {
    // Handle search form submission
    $search = $_POST['search'];
    $search = $conn->real_escape_string($search);

    // Fetch players based on search input
    $sql = "SELECT * FROM players WHERE 
                first_name LIKE '%$search%' OR 
                last_name LIKE '%$search%' OR 
                nationality LIKE '%$search%'";
} else {
    // Fetch all players if no search input
    $sql = "SELECT * FROM players";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
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
    <title>Player Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: url('player_pro2.jpg') no-repeat center center/cover;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto; /* Adjust spacing */
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.8);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            margin-left: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Player Profiles</h1>
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search by name or nationality..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
        <?php if (count($players) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Nationality</th>
                        <th>Score</th>
                        <th>Assist</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($players as $player): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($player['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($player['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($player['nationality']); ?></td>
                            <td><?php echo htmlspecialchars($player['score']); ?></td>
                            <td><?php echo htmlspecialchars($player['assist']); ?></td>
                            <td><?php echo htmlspecialchars($player['date_of_birth']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center;">No players found.</p>
        <?php endif; ?>
        
        <!-- Back Button -->
        <div class="back-button">
            <button onclick="history.back()">Back</button>
        </div>
    </div>
</body>
</html>