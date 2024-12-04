<?php
// Include database connection
include '../connection/connection.php';

// Fetch clubs and their associated stadiums
$sql = "SELECT clubs.name AS club_name, stadiums.stadium_name, stadiums.stadium_image
        FROM clubs
        JOIN stadiums ON clubs.c_id = stadiums.c_id";
$result = $conn->query($sql);
$stadiums = [];

if ($result->num_rows > 0) {
    while ($stadium = $result->fetch_assoc()) {
        $stadiums[] = $stadium;  // Collect the stadium data into the array
    }
} else {
    echo "No stadiums found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stadiums</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .stadium-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .stadium-card {
            background-color: #fff;
            border-radius: 8px;
            margin: 15px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .stadium-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .stadium-card h3 {
            margin-top: 10px;
            font-size: 20px;
        }
        .stadium-card p {
            font-size: 16px;
            color: #555;
        }
        .back-button {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="stadium-container">
        <?php foreach ($stadiums as $stadium): ?>
            <div class="stadium-card">
                <!-- Displaying the image as Base64-encoded data -->
                <img src="data:image/jpeg;base64,<?php echo base64_encode($stadium['stadium_image']); ?>" alt="<?php echo htmlspecialchars($stadium['stadium_name']); ?>">
                <h3><?php echo htmlspecialchars($stadium['stadium_name']); ?></h3>
                <p>Club: <?php echo htmlspecialchars($stadium['club_name']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="back-button">
        <button onclick="history.back()">Back</button>
    </div>
</body>
</html>
