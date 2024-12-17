<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_id = isset($_GET['order_detail']) ? intval($_GET['order_detail']) : 0;

if (isset($_POST['mark_delivered'])) {
    $delete_sql = "DELETE FROM orders WHERE order_id = $order_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<p>Order marked as delivered and removed from the database.</p>";
    } else {
        echo "<p>Error deleting order: " . $conn->error . "</p>";
    }
}

$sql = "SELECT o.order_id, orders.user_name, p.product_id, p.product_title, p.image_1, o.quantity
        FROM products p
        JOIN orderitems o ON p.product_id = o.product_id
        JOIN orders ON o.order_id = orders.order_id
        WHERE o.order_id = $order_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h4>Order Id: " . $row["order_id"] . "<br>User Name: " . $row["user_name"] . "</h4>";

    echo "<table border='1' style='width:100%; background-color:white; text-align:center; margin: 10px;'>";
    echo "<tr style='background-color:orange; color:white;'>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Quantity</th>
          </tr>";
    
    do {
        echo "<tr>
                <td>" . $row["product_id"] . "</td>
                <td>" . $row["product_title"] . "</td>
                <td><img src='../product_images/" . $row["image_1"] . "' alt='Product Image' style='width: 50px; height: auto;'></td>
                <td>" . $row["quantity"] . "</td>
              </tr>";
    } while ($row = $result->fetch_assoc());
    
    echo "</table>"; 
    
    // Add a form with "Mark as Delivered" button
    echo "<form method='POST' style='text-align: center; margin-top: 20px;'>
            <button type='submit' name='mark_delivered' class='btn btn-success'>Mark as Delivered</button>
          </form>";
} else {
    echo "No products found.";
}

$conn->close();
?>

<script src="https://kit.fontawesome.com/c25c9d9b0b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
