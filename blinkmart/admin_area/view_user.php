<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *  FROM user where role not in ('admin')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; text-align:center;'>";
    echo "<tr><th>user_name</th><th>Address</th><</tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["user_name"] . "</td>
                <td>" . $row["address"] . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No User found.";
}

$conn->close();
?>
