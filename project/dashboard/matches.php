<?php
// Include database connection
include '../connection/connection.php';

// Fetch all matches and their results
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
    <title>Match Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('salah.jpg') no-repeat center center/cover;
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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .match-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .match-table th, .match-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
            color: #000;
            background-color: #fff;
        }
        .no-matches {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Match Results</h1>

    <?php if (count($matches) > 0): ?>
        <table class="match-table">
            <tr>
                <th>Match Date</th>
                <th>Club 1</th>
                <th>Club 2</th>
                <th>Club 1 Score</th>
                <th>Club 2 Score</th>
            </tr>
            <?php foreach ($matches as $match): ?>
                <tr>
                    <td><?php echo htmlspecialchars($match['match_date']); ?></td>
                    <td><?php echo htmlspecialchars($match['club_1_name']); ?></td>
                    <td><?php echo htmlspecialchars($match['club_2_name']); ?></td>
                    <td><?php echo is_null($match['club_1_score']) ? 'TBD' : htmlspecialchars($match['club_1_score']); ?></td>
                    <td><?php echo is_null($match['club_2_score']) ? 'TBD' : htmlspecialchars($match['club_2_score']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p class="no-matches">No matches found.</p>
    <?php endif; ?>
</div>

</body>
</html>
