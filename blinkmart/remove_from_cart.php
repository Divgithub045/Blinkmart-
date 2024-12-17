<?php
include("includes/connect.php");
session_start();

if (isset($_GET['product_id'])) {
    $username = $_SESSION['username'];
    $product_id = $_GET['product_id'];
    $delete_query = "DELETE FROM cart WHERE username = '$username' AND product_id = '$product_id'";
    mysqli_query($con, $delete_query);
}

header("Location: cart.php");
exit();
?>
