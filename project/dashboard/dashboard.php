<?php
include '../connection/connection.php';
// Start the session
session_start();

// Check if the user is logged in


// Example user info (Replace with your database query to fetch user info)


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Club Management Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('dashb.jpg') no-repeat center center/cover;
            margin: 0;
            color: #fff;
            display: flex;
            flex-direction: column-reverse;
            align-items: right;
            height: 100vh;
        }
        .dashboard-container {
            margin: 20px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.7);
            text-align: center;
       }

        h1 {
            margin-bottom: 20px;
        }
        .welcome {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }
        .menu a {
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            padding: 15px;
            border-radius: 4px;
            font-size: 16px;
            text-align: center;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
        .logout {
            margin-top: 20px;
        }
        .logout a {
            color: #FF6347;
            text-decoration: none;
            font-size: 14px;
        }
        .logout a:hover {
            text-decoration: underline;
        }
        .creator-info {
            margin-top: 30px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
        }
        .creator-info h2 {
            margin-bottom: 10px;
            font-size: 20px;
        }
        .creator-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Football Club Management </h1>
        <p class="welcome"> Welcome to the Dashboard !</p>
        <div class="menu">
            <a href="edit.php">Edit</a>
            <a href="player_profile.php">Player Profiles</a>
            <a href="matches.php">Matches</a>
            <a href="stadiums.php">Stadiums</a>
            <a href="managers.php">Managers</a>
            <a href="coaches.php">Coaches</a>
            <a href="kits.php">Kits</a>
            <a href="clubs.php">Clubs</a> 
            <a href="about.php">About</a>
        </div>
        
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>