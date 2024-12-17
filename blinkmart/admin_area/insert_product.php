<?php
include('../includes/connect.php');
$select_categories = "SELECT * FROM `categories`";
$result_categories = mysqli_query($con, $select_categories);


$select_brands = "SELECT * FROM `brands`";
$result_brands = mysqli_query($con, $select_brands);
?>
<?php
include('../includes/connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_title = $_POST['product_title'];
    $description = $_POST['description']; 
    $keywords = $_POST['keywords'];
    $category_id = $_POST['category'];
    $brand_id = $_POST['brand'];
    $price = $_POST['price'];
    $image1 = $_FILES['image1']['name'];
    $image_tmp1 = $_FILES['image1']['tmp_name'];
    move_uploaded_file($image_tmp1, "../product_images/$image1");

    $insert_product = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, image_1, price) 
                       VALUES ('$product_title', '$description', '$keywords', '$category_id', '$brand_id', '$image1', '$price')";

    $result_query = mysqli_query($con, $insert_product);

    if ($result_query) {
        echo "Product inserted successfully!";
        echo"<script>windows.location.href='index.php'</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-white" style="background-color:orange">
    <div class="container mt-5">
        <h2 class="text-center">Insert Product</h2>
        <form action="insert_product.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="product_title" name="product_title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"> </textarea>
            </div>
            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords</label>
                <input type="text" class="form-control" id="keywords" name="keywords" >
            </div>

            <!-- Category Dropdown -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required >
                    <option value="">Select Category</option>
                    <?php
                    while($row_category = mysqli_fetch_assoc($result_categories)) {
                        $category_id = $row_category['category_id'];
                        $category_title = $row_category['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select" id="brand" name="brand" required >
                    <option value="">Select Brand</option>
                    <?php
                    while($row_brand = mysqli_fetch_assoc($result_brands)) {
                        $brand_id = $row_brand['brand_id'];
                        $brand_title = $row_brand['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image1" class="form-label">Image 1</label>
                <input type="file" class="form-control" id="image1" name="image1" required>
                </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Insert Product" name="submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
