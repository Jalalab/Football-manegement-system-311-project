<?php
include '../connection/connection.php';




  $sql =  "SELECT* FROM signup";
  $result = $conn->query($sql);
  $count = mysqli_num_rows($result);

  if ($count > 0) {
    echo "<table border = '3' ";

echo "<tr><th>UserId</th> <th>FullName</th> <th>Email </th>";

    while($row =  $result -> fetch_assoc()){
    echo "<tr>";  
    echo"<td>".$row["UserId"]."</td>";
    echo "<td>".$row["FullName"]."</td>";
    echo "<td>".$row["Email"]."</td>";
  }

  echo "</table>";
}


?>