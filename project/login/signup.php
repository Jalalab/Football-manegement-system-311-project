<?php 

 include '../connection/connection.php';
  

if(isset($_POST["submit"])){
    $fullname =   $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    


    
$sql = "INSERT INTO signup (Fullname,Email,Password) 
values('$fullname', '$email','$password')";


if($conn->query($sql)===true) {
    
    echo '<a href="login.html" target="_blank">LOG IN </a>';
} else {
   echo "Data not inserted";
}

}











?>