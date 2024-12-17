<?php
include("includes/connect.php");
session_start();

$username = $_SESSION['username'];

$select_cart_query = "SELECT cart.product_id, cart.quantity, products.product_title, products.price, products.image_1 
                      FROM `cart` 
                      JOIN `products` ON cart.product_id = products.product_id 
                      WHERE cart.username = '$username'";
$result_cart = mysqli_query($con, $select_cart_query);

$total_price = 0;
$cart_items = [];

while ($row = mysqli_fetch_assoc($result_cart)) {
    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $product_price = $row['price'];
    $item_total = $product_price * $quantity;
    $total_price += $item_total;
    
    $cart_items[] = [
        'product_id' => $product_id,
        'quantity' => $quantity,
        'product_price' => $product_price
    ];
}

$order_query = "INSERT INTO Orders (user_name, order_date, `Total Price`, status) VALUES ('$username', NOW(), $total_price, 'Pending')";

mysqli_query($con, $order_query);

$order_id = mysqli_insert_id($con);

foreach ($cart_items as $item) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];
    $price = $item['product_price'];
    $order_item_query = "INSERT INTO OrderItems (order_id, product_id, quantity, price) VALUES ($order_id, $product_id, $quantity, $price)";
    mysqli_query($con, $order_item_query);
}

$clear_cart_query = "DELETE FROM cart WHERE username = '$username'";
mysqli_query($con, $clear_cart_query);

header("Location: checkout.html");
exit();
?>
