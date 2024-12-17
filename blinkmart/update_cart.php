<?php
include("includes/connect.php");
session_start();

if (isset($_POST['product_id']) && isset($_POST['action'])) {
    $username = $_SESSION['username'];
    $product_id = $_POST['product_id'];
    $action = $_POST['action'];
    $query = "SELECT quantity FROM cart WHERE username = '$username' AND product_id = '$product_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $current_quantity = $row['quantity'];

    if ($action === 'increase') {
        $new_quantity = $current_quantity + 1;
    } elseif ($action === 'decrease' && $current_quantity > 1) {
        $new_quantity = $current_quantity - 1;
    } else {
        $new_quantity = $current_quantity;
    }
    $update_query = "UPDATE cart SET quantity = '$new_quantity' WHERE username = '$username' AND product_id = '$product_id'";
    mysqli_query($con, $update_query);
}
header("Location: cart.php");
exit();
?>
