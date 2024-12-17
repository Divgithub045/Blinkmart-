<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT p.product_id, p.product_title, p.price, p.image_1, b.brand_title, c.category_title 
        FROM products p
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN categories c ON p.category_id = c.category_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='5' class ='m-10' style='width:100%; background-color:white; text-align:center;'>";
    echo "<tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Image</th><th>Brand</th><th>Category</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr border='2'>
                <td>" . $row["product_id"] . "</td>
                <td>" . $row["product_title"] . "</td>
                <td>" . $row["price"] . "</td>
                <td><img src='../product_images/" . $row["image_1"] . "' alt='Product Image' style='width: 50px; margin:2px ;height: auto;'></td>
                <td>" . $row["brand_title"] . "</td>
                <td>" . $row["category_title"] . "</td>
              </tr>";
    }
    
    echo "</table>"; 
} else {
    echo "No products found.";
}
$conn->close();
?>
