<html>
  <head>
  <link rel="stylesheet" href="style.css">
</head>



<form method="post" action="" class="mb-2">
  <div class="input-group mb-2 w-50">
    <span class="input-group-text" id="basic-addon1">
      <i class="fa-solid fa-receipt"></i>
    </span>
    <input name="cat_title" type="text" class="form-control" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
  </div>
  
  <div class="d-flex justify-content-center mt-3">
  <div class="d-flex justify-content-center mt-3">
    <input type="submit" value="Insert" name="insert_cat" class="bg-dark-orange m-2 p-2 b-0 w-20 text-light">
  </div> 
  </div>
</form>
</body>
</html>
<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
  $cat_title = $_POST['cat_title'];  
  $select_query = "SELECT * FROM `categories` WHERE category_title = '$cat_title'";
  $result_select=mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if ($number>0)
  {
    echo "<script>alert('Category Inserted Already in Database')</script>";
  }
else
{
    
  $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$cat_title')";  

  $result = mysqli_query($con, $insert_query);

  if ($result) {
    echo "'Category Inserted Successfully'"; 
  } else {
    echo "Insertion Failed";
}
}}
?>