<?php
// Start session and check login
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .dashboard-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-container a {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .dashboard-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome Admin</h1>
        <p><a href="editplayers.php">Manage Players</a></p>
        <p><a href="editmanegers.php">Manage Manegers</a></p>
        <p><a href="creatematch.php"> Create Match</a></p>
        <p><a href="nlogout.php">Logout</a></p>
    </div>
</body>
</html>
