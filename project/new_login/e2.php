<?php
// Start session and check login


// Include database connection
include '../connection/connection.php';

// Get the player ID to edit
if (isset($_GET['id'])) {
    $player_id = $_GET['id'];

    // Fetch player data for editing
    $sql = "SELECT * FROM players WHERE p_id = $player_id";
    $result = $conn->query($sql);
    $player = $result->fetch_assoc();
}

// Handle UPDATE operation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $score = $_POST['score'];
    $assist = $_POST['assist'];
    $dob = $_POST['date_of_birth'];
    

    $sql = "UPDATE players SET first_name='$first_name', last_name='$last_name', 
            score='$score', assist='$assist', date_of_birth='$dob' WHERE p_id = $player_id";
    $conn->query($sql);
    header('Location:../new_login/editplayers.php');
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
</head>
<body>
    <div>
        <h2>Edit Player</h2>

        <form method="POST">
            <input type="text" name="first_name" value="<?php echo $player['first_name']; ?>" required>
            <input type="text" name="last_name" value="<?php echo $player['last_name']; ?>" required>
            <input type="number" name="score" value="<?php echo $player['score']; ?>" required>
            <input type="number" name="assist" value="<?php echo $player['assist']; ?>" required>
            <input type="date" name="date_of_birth" value="<?php echo $player['date_of_birth']; ?>" required>
            <button type="submit" name="update">Update Player</button>
        </form>

        <br>
        <a href="editplayers.php">Back</a>
    </div>
</body>
</html>
