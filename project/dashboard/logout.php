<?php
include '../connection/connection.php';
session_start();
session_destroy();
header("location:../index.html");

echo '<a href="index.html" target="_blank"> GO BACK </a>';

exit();
?>
