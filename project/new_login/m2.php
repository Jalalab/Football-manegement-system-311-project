<?php
// Include database connection
include '../connection/connection.php';

// Get the manager ID to edit
if (isset($_GET['id'])) {
    $manager_id = $_GET['id'];

    // Fetch manager data for editing
    $sql = "SELECT * FROM managers WHERE m_id = $manager_id";
    $result = $conn->query($sql);
    $manager = $result->fetch_assoc();
}

// Handle UPDATE operation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $club_name = $_POST['club_name'];
    $experience = $_POST['experience'];

    $sql = "UPDATE managers SET name='$name', start_date='$start_date', end_date='$end_date', 
            club_name='$club_name', experience=$experience WHERE m_id = $manager_id";
    $conn->query($sql);

    // Redirect to the managers page
    header('Location:../new_login/editmanegers.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        form button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #007BFF;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Manager</h2>

        <!-- Form to Edit Manager -->
        <form method="POST">
            <input type="text" name="name" value="<?php echo htmlspecialchars($manager['name']); ?>" required>
            <input type="date" name="start_date" value="<?php echo htmlspecialchars($manager['start_date']); ?>" required>
            <input type="date" name="end_date" value="<?php echo htmlspecialchars($manager['end_date']); ?>">
            <input type="text" name="club_name" value="<?php echo htmlspecialchars($manager['club_name']); ?>" required>
            <input type="number" name="experience" value="<?php echo htmlspecialchars($manager['experience']); ?>" required>
            <button type="submit" name="update">Update Manager</button>
        </form>

        <br>
        <a href="editmanegers.php">Back</a>
    </div>
</body>
</html>
