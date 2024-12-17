<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
  $cat_title = $_POST['brand_title'];  
  $select_query = "SELECT * FROM `brands` WHERE brand_title = '$cat_title'";
  $result_select=mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if ($number>0)
  {
    echo "<script>alert('Brand Inserted Already in Database')</script>";
  }
else
{
    
  $insert_query = "INSERT INTO `Brands` (brand_title) VALUES ('$cat_title')";  

  $result = mysqli_query($con, $insert_query);

  if ($result) {
    echo "<script>alert('Brand Inserted Successfully');</script>"; 
  } else {
    echo "<script>alert('Insertion Failed');</script>";
}
}}
?>

<form method="post" action="" class="mb-2">
  <div class="input-group mb-2 w-50">
    <span class="input-group-text" id="basic-addon1">
      <i class="fa-solid fa-tag"></i>
    </span>
    <input type="text" name='brand_title' class="form-control" placeholder="Insert Brand" aria-label="Brand" aria-describedby="basic-addon1">
  </div>

  <div class="d-flex justify-content-center mt-3">
    <input type="submit" value="Insert" name="insert_cat" class="bg-dark-orange m-2 p-2 b-0 w-20 text-light">
  </div> 
</form>
