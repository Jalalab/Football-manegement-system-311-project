<?php
// Start session
session_start();

// Ensure the user is authenticated

// Include database connection
include '../connection/connection.php';

// Initialize variables
$search = "";
$managers = [];

// Query to fetch managers
if (isset($_POST['search']) && !empty($_POST['search'])) {
    // Handle search form submission
    $search = $_POST['search'];
    $search = $conn->real_escape_string($search);

    // Fetch managers based on search input
    $sql = "SELECT * FROM managers WHERE 
                name LIKE '%$search%' OR 
                club_name LIKE '%$search%'";
} else {
    // Fetch all managers if no search input
    $sql = "SELECT * FROM managers";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $managers[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: url('maneger.jpg') no-repeat center center/cover;
            color: #333;
        }
        .container {
         max-width: 700px;
         margin: 200px auto; /* Adjust margin for positioning */
         padding: 10px;
         border-radius: 5px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
         background: rgba(255, 255, 255, 0.5); /* Adjust alpha value for transparency */
         backdrop-filter: blur(2px); /* Optional: Add a blur effect for better aesthetics */
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
        <h1>Manager Profiles</h1>
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search by name or club..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
        <?php if (count($managers) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Club Name</th>
                        <th>Experience (Years)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($managers as $manager): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($manager['name']); ?></td>
                            <td><?php echo htmlspecialchars($manager['m_id']); ?></td>
                            <td><?php echo htmlspecialchars($manager['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($manager['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($manager['club_name']); ?></td>
                            <td><?php echo htmlspecialchars($manager['experience']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center;">No managers found.</p>
        <?php endif; ?>

        <!-- Back to Dashboard Button -->
        <div class="back-button">
            <form method="GET" action="dashboard.php">
                <button type="submit">Back</button>
            </form>
        </div>
    </div>
</body>
</html>
