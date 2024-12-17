<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >
    <div class="banner" style="width:100vw; height:20%">
    <img src="../project_banner.png" alt="">
</div>

    <div class="wrapped">
    <div class="content" style="border:2px;">
    
    <!-- <div class="bg-dark-orange" style="color:white;text-align:right">
        <h4>Hello Admin<h4>
    </div> -->
      
    <div class="row">
        <div class="col-md-12 bg-light-orange  mb-2">
           <div class="text-light"> <h4>Admin Panel NNB </h4>
        <button class="bg-dark-orange text-light">
          <a class="nav-link" href="../logout.php">Log Out</a> 
        </button>
        </div>

            <br>

            <div class="button text-center">
                <button><a href="insert_product.php" class="nav-link  ny-1">Insert Products</a></button>
                <button><a href="index.php?view_product" class="nav-link  ny-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link  ny-1">Insert Categories</a></button>
                <button><a href="index.php?view_category" class="nav-link  ny-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link  ny-1">Insert Brand</a> </button>
                <button><a href="index.php?view_brand" class="nav-link  ny-1">View Brands</a></button>
                <button><a href="index.php?view_user" class="nav-link  ny-1">View User</a></button>
                <button><a href="index.php?view_order" class="nav-link  ny-1">View Orders</a></button>
            </div>
            
        </div>
        </div>
    </div>
        <?php
        if (isset($_GET['insert_category']))
        {
            include('inser_category.php');
        }
        else if (isset($_GET['insert_brand']))
        {
            include('insert_brand.php');
        }
        if (isset($_GET['view_product']))
        {
            include('view_product.php');
        }
        if (isset($_GET['view_category']))
        {
            include('view_category.php');
        }
        if (isset($_GET['view_brand']))
        {
            include('view_brand.php');
        }
        if (isset($_GET['view_user']))
        {
            include('view_user.php');
        }
        if (isset($_GET['view_order']))
        {
            include('view_order.php');
        }
        if (isset($_GET['order_detail']))
        {
            include('order_detail.php');
        }
        ?>
</div>
<script src="https://kit.fontawesome.com/c25c9d9b0b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>