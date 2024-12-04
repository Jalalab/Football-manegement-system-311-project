<?php
// Start session and destroy it
include '../connection/connection.php';
session_start();
session_destroy();
header('Location:../dashboard/dashboard.php');
exit();
?>
