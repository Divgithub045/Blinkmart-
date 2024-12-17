<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT category_id, category_title FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; text-align:center;'>";
    echo "<tr><th>Category ID</th><th>Category Title</th><</tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["category_id"] . "</td>
                <td>" . $row["category_title"] . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No categories found.";
}

$conn->close();
?>
