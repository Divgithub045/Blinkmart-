

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; text-align:center;'>";
    echo "<tr>
            <th>Order ID</th>
            <th>User Name</th>
            <th>Order Date</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>";
    
    while ($row = $result->fetch_assoc()) {
        $order_id = $row["Order_id"];
        echo "<tr>
                <td>" . $order_id . "</td>
                <td>" . $row["user_name"] . "</td>
                <td>" . $row["order_date"] . "</td>
                <td>" . $row["Total Price"] . "</td>
                <td>" . $row["Status"] . "</td>
                <td><a href='index.php?order_detail=" . $order_id . "'>View Details</a></td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No orders found.";
}

$conn->close();
?>
