<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT brand_id, brand_title FROM brands";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; text-align:center;'>";
    echo "<tr><th>Brand ID</th><th>Brand Title</th><</tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
               echo "<td>" . $row["brand_id"] . "</td>";
                echo "<td>" . $row["brand_title"] . "</td>";
              "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No categories found.";
}

$conn->close();
?>
