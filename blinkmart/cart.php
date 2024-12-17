<?php
include("includes/connect.php");
session_start();

$username = $_SESSION['username'];
$select_cart_query = "SELECT cart.product_id, cart.quantity, cart.address, products.product_title, products.price, products.image_1 
                      FROM `cart` 
                      JOIN `products` ON cart.product_id = products.product_id 
                      WHERE cart.username = '$username'";
$result_cart = mysqli_query($con, $select_cart_query);

$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-bag-shopping"></i> BlinkMart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </form>
    </div>
  </div>
</nav>
<div class="banner" style="width:100vw; height:20%">
    <img src="project_banner.png" alt="">
</div>
<div class="bg-dark-orange border">
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav me-auto ">
        <li class="nav-item">
        <a href="#" class="nav-link">
        <p style="color:white">Welcome <?php echo $_SESSION['username']; ?></p></a>
        </li>
       
    </ul>
</nav>
</div>
    <div class="container">
        <h1 class="my-4">Your Cart</h1>
        
        <?php if(mysqli_num_rows($result_cart) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result_cart)): ?>
                        <?php
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_image = $row['image_1'];
                        $product_price = $row['price'];
                        $quantity = $row['quantity'];
                        $item_total = $product_price * $quantity;
                        $total_price += $item_total;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product_title); ?></td>
                            <td><img src="product_images/<?php echo $product_image; ?>" alt="<?php echo htmlspecialchars($product_title); ?>" width="50"></td>
                            <td>
                                <div class="d-flex">
    
                                    <form action="update_cart.php" method="post" style="margin-right: 5px;">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="btn btn-secondary btn-sm">-</button>
                                    </form>
                                    <span class="mx-2"><?php echo $quantity; ?></span>
                                    <form action="update_cart.php" method="post" style="margin-left: 5px;">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="btn btn-secondary btn-sm">+</button>
                                    </form>
                                </div>
                            </td>
                            <td><?php echo $product_price; ?> Rs.</td>
                            <td><?php echo $item_total; ?> Rs.</td>
                            <td>
                                <a href="remove_from_cart.php?product_id=<?php echo $product_id; ?>" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <h4>Total: <?php echo $total_price; ?> Rs.</h4>
            <!-- <h2> <a href=""><button  value="checkout" class="bg-dark-orange  text-light"> Checkout </button> </h2> -->
           <h2> <form action="checkout.php"><input type="submit" value="Checkout" class ="bg-dark-orange text-light"></form> </h2> 
        <?php else: ?>
            <div class="center">
            <img src="empty_cart.png" alt="">
            <br>
        
        <p class="big">Your cart is Empty</p>
        <br>
        <button><a href="index.php" class=" btn bg-light-orange mb-10"><span style="color:orange">Start Shopping</span></a></button>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
