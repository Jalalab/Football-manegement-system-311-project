<?php
// Include the database connection
include '../connection/connection.php';

// Start session
session_start();

// Initialize variables
$search = "";
$coaches = [];

// Handle search query
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);

    // Search query for coaches
    $sql = "SELECT * FROM coaches WHERE 
            name LIKE '%$search%' OR 
            email LIKE '%$search%' OR 
            phone_number LIKE '%$search%' OR
            nationality LIKE '%$search%'";
} else {
    // Query to fetch all coaches
    $sql = "SELECT * FROM coaches";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coaches[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('coach_bg.jpg') no-repeat center center/cover;
            margin: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        h1 {
            color: #007BFF;
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
        .back-button {
            display: inline-block;
            margin-top: 20px;
            color: #FF6347;
            text-decoration: none;
        }
        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coach Management</h1>
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search by name, email, or nationality..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
        <?php if (count($coaches) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Coach ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Nationality</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($coaches as $coach): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($coach['coach_id']); ?></td>
                            <td><?php echo htmlspecialchars($coach['name']); ?></td>
                            <td><?php echo htmlspecialchars($coach['date_of_birth']); ?></td>
                            <td><?php echo htmlspecialchars($coach['email']); ?></td>
                            <td><?php echo htmlspecialchars($coach['phone_number']); ?></td>
                            <td><?php echo htmlspecialchars($coach['nationality']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No coaches found.</p>
        <?php endif; ?>
        <a href="dashboard.php" class="back-button">Back</a>
    </div>
</body>
</html>
