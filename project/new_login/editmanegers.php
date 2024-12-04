<?php
// Include database connection
include '../connection/connection.php';

// Handle CREATE operation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $club_name = $_POST['club_name'];
    $experience = $_POST['experience'];

    $sql = "INSERT INTO managers (name, start_date, end_date, club_name, experience)
    VALUES ('$name', '$start_date', '$end_date', '$club_name', $experience)";

    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Manager added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

}

// Handle DELETE operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM managers WHERE m_id = $id";
    $conn->query($sql);
}

// Fetch managers for display
$sql = "SELECT * FROM managers";
$result = $conn->query($sql);
$managers = [];
if ($result->num_rows > 0) {
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
    <title>Manage Managers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .manager-container {
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
    <div class="manager-container">
        <h2>Manage Managers</h2>

        <!-- Form to Add New Manager -->
        <form method="POST">
            <input type="text" name="name" placeholder="Manager Name" required>
            <input type="date" name="start_date" placeholder="Start Date" required>
            <input type="date" name="end_date" placeholder="End Date">
            <input type="text" name="club_name" placeholder="Club Name" required>
            <input type="number" name="experience" placeholder="Experience (years)" required>
            <button type="submit" name="create">Add Manager</button>
        </form>

        <table>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Club Name</th>
                <th>Experience</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($managers as $manager): ?>
            <tr>
                <td><?php echo htmlspecialchars($manager['name']); ?></td>
                <td><?php echo htmlspecialchars($manager['start_date']); ?></td>
                <td><?php echo htmlspecialchars($manager['end_date']); ?></td>
                <td><?php echo htmlspecialchars($manager['club_name']); ?></td>
                <td><?php echo htmlspecialchars($manager['experience']); ?></td>
                <td>
                    <a href="m2.php?id=<?php echo $manager['m_id']; ?>" class="btn">Edit</a>
                    <a href="?delete=<?php echo $manager['m_id']; ?>" class="btn">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="dash.php" class="btn">Back</a>
    </div>
</body>
</html>
