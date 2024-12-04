<?php
// Include database connection
include '../connection/connection.php';



// Start session
session_start();

// Initialize variables
$clubs = [];

// Query to fetch club data along with manager, coach, and players
$sql = "
    SELECT 
    clubs.c_id, 
    clubs.name, 
    clubs.picture_blob, 
    managers.name AS manager_name, 
    coaches.name AS coach_name,
    GROUP_CONCAT(players.first_name, ' ', players.last_name) AS player_names
FROM 
    clubs
LEFT JOIN managers ON clubs.m_id = managers.m_id
LEFT JOIN coaches ON clubs.coach_id = coaches.coach_id
LEFT JOIN player_club ON clubs.c_id = player_club.c_id
LEFT JOIN players ON player_club.p_id = players.p_id
GROUP BY 
    clubs.c_id;

";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clubs[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('culb.jpg') no-repeat center center/cover;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .club {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
        }
        .club img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
        .club-details {
            padding: 15px;
            flex: 1;
        }
        .club-details h2 {
            margin-top: 0;
        }
        .club-details p {
            margin: 5px 0;
        }
        .back-button {
            display: block;
            width: 150px;
            margin: 0 auto;
            padding: 10px 20px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Football Clubs</h1>
        <?php if (count($clubs) > 0): ?>
            <?php foreach ($clubs as $club): ?>
                <div class="club">
                <img src="images/<?php echo htmlspecialchars($club['picture_blob']); ?>" alt="Club Image">

                    <div class="club-details">
                        <h2><?php echo htmlspecialchars($club['name']); ?></h2>
                        <p><strong>Manager:</strong> <?php echo htmlspecialchars($club['manager_name']); ?></p>
                        <p><strong>Coach:</strong> <?php echo htmlspecialchars($club['coach_name']); ?></p>
                        <p><strong>Players:</strong> <?php echo htmlspecialchars($club['player_names']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No clubs found.</p>
        <?php endif; ?>
        <a href="dashboard.php" class="back-button">Back</a>
    </div>

</body>
</html>
