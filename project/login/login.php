<?php
include '../connection/connection.php';


$email = $_POST ['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM signup WHERE Email = '$email' AND  Password = '$password' ";
    
$result = $conn->query($sql);

$count = mysqli_num_rows($result);

if ($count > 0) {
   //echo"<br><br>Log in successfully";
   header("location:../dashboard/dashboard.php");

}else{
  echo "<br><br>Invalid email or pass ";
  echo '<a href="login.html" target="_blank">LOG IN OR </a>';
  echo '<a href="sign.html" target="_blank"> Sign UP </a>';
}


?>