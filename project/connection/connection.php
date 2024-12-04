<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'porject';

   $conn = new mysqli($servername, $username, $password, $dbname);
   
   
   if ($conn->connect_error) {
    die("Connection Failed");
   }else{
      echo "Connected Successfully";
   }
  
   

?>