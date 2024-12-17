<?php
include("includes/connect.php");
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" >Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a> 
        </li>

      </ul>
      <form class="d-flex" role="search" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <input type="submit" value="search" class="btn btn-outline-dark" name="search_data_product">
         
      </form>
    </div>
  </div>
</nav>
<div class="banner">
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
<div class="bg-light">
    <h3 class="text-center">Blink Mart</h3>
    <p class="text-center">Discover everything you need under one roof -- quality, value, variety, and convenience for your everyday lifestyle!</p>
</div>

<div class="row">
<div class="col-md-10">
<?php
if (isset($_GET['search_data_product']) && !empty($_GET['search_data'])) {
  $search_query = mysqli_real_escape_string($con, $_GET['search_data']); 
  $select_products = "SELECT * 
    FROM `brands` 
    NATURAL JOIN `products` 
    NATURAL JOIN `categories` 
    WHERE product_title LIKE '%$search_query%' 
    OR product_description LIKE '%$search_query%' 
    OR product_keywords LIKE '%$search_query%' 
    OR category_title LIKE '%$search_query%' 
    OR brand_title LIKE '%$search_query%' 
    ORDER BY RAND();";
} elseif (isset($_GET['category'])) {
  $category_id = (int)$_GET['category'];
  $select_products = "SELECT * FROM `products` WHERE category_id = $category_id ORDER BY RAND()";
} elseif (isset($_GET['brand'])) {
  $brand_id = (int)$_GET['brand'];
  $select_products = "SELECT * FROM `products` WHERE brand_id = $brand_id ORDER BY RAND() ";
} else {
  $select_products = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,9";
}


$result_products = mysqli_query($con, $select_products);


echo '<div class="row">';

while ($row_product = mysqli_fetch_assoc($result_products)) {
    $product_title = $row_product['product_title'];
    $product_description = $row_product['product_description'];
    $product_image = $row_product['image_1'];
    $product_id = $row_product['product_id']; 
    $product_price = $row_product['price'];
    
    
    echo '<div class="col-md-4 mb-4">
            <div class="card m-3" style="width:auto; height:400px;">
                <img src="product_images/' . $product_image . '" class="card-img-top" style="object-fit:contain" alt="' . htmlspecialchars($product_title) . '">
                <div class="card-body">
                    <h5 class="card-title">' . htmlspecialchars($product_title) . '</h5>
                    <h6>' . htmlspecialchars($product_price) . ' Rs.</h6>
                    <p class="card-text">' . htmlspecialchars($product_description) . '</p>
                    <a href="index.php?add_to_cart=' . $product_id . '" class="btn btn-primary">Add To Cart</a>
                </div>
            </div>
          </div>';
}


echo '</div>';
?>

<?php
if (isset($_GET['add_to_cart'])) {
  $product_id = $_GET['add_to_cart'];
  $username = $_SESSION['username'];

  $user_address_query = "SELECT address FROM `user` WHERE user_name = '$username'";
  $user_address_result = mysqli_query($con, $user_address_query);
  $user_address_row = mysqli_fetch_assoc($user_address_result);
  $user_address = $user_address_row['address'];

  $check_cart_query = "SELECT * FROM `cart` WHERE username = '$username' AND product_id = $product_id";
  $check_cart_result = mysqli_query($con, $check_cart_query);

  if (mysqli_num_rows($check_cart_result) > 0) {
      $update_cart_query = "UPDATE `cart` SET quantity = quantity + 1 WHERE username = '$username' AND product_id = $product_id";
      mysqli_query($con, $update_cart_query);
  } else {
    $insert_cart_query = "INSERT INTO `cart` (username, product_id, address, quantity) VALUES ('$username', $product_id, '$user_address', 1)";
    mysqli_query($con, $insert_cart_query);
    
  }
  
  // echo "<script>alert('Product added to cart successfully!');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
  
}

?>
</div>

        
    <div class="col-md-2 bg-light-orange p-0">
       <ul class="navbar-nav me-auto">
        <li class="nav-item bg-dark-orange text-center"  >
            <a href="" class="nav-link">Brands</a>
        </li>
        <?php
        $select_brands = "select * from `brands`";
        $result_brands = mysqli_query($con,$select_brands);
        while($row_data=mysqli_fetch_assoc($result_brands))
        {
            $brand_list = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];

            echo "<li class='nav-item text-center'>
            <a href='index.php?brand=$brand_id' class='nav-link'> $brand_list </a>
        </li>";
        }

        ?>
        <li class="nav-item bg-dark-orange text-center"  >
            <a href="" class="nav-link">Categories</a>
        </li>

        <?php
        $select_category = "select * from `categories`";
        $result_category = mysqli_query($con,$select_category);
        while($row_data=mysqli_fetch_assoc($result_category))
        {
            $category_list = $row_data['category_title'];
            $category_id = $row_data['category_id'];

            echo "<li class='nav-item text-center'>
            <a href='index.php?category=$category_id' class='nav-link'> $category_list </a>
        </li>";
        }

        ?>
    </div>
    </div>
</div>
<div class="bg-black p-2 text-center border">
    <p>All Right Reserved - Designed By NNB</p>
</div>
<script src="https://kit.fontawesome.com/c25c9d9b0b.js" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<script>
  window.addEventListener("unload", function(){navigation.sendBeacon('logout.php');});
  </script>