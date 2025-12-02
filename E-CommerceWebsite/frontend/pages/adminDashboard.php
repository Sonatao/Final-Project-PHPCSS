<?php
session_start();
if($_SESSION['role'] != 'admin') {
    die('Access Denied.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Clothing. Mens. Womens. Workers. Work. Boots. Shoes. Sandals. Top. Bottom. Tops. Bottoms.">
    <meta name="robots">

<!-- This is a massive nuisance with the cache busting, I was so lost for so long as to why it wasnt updating despite being properly linked,
 spent too long here on the dumbest thing. -->

    <link rel="stylesheet" href="../css/style.css?=v3">
    <title>E-Commerce Website</title>

</head> 
<body>

<?php include "../../backend/globals/header.php"; ?>


<section class = adminDashboard>
    <form method="GET" class="adminSearchBar">
        <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($searchTerm); ?>">
      <button type="submit">Search</button>
    </form>
<!-- Create -->
<section class = "createProduct">
<form action="../../backend/CRUD/CRUD.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="action" value="create">

<h2> Create Product </h2>

<label for="name">Product Name: </label>
<input type="text" name="product_Name" required>

<label for="price">Price: </label>
<input type="number" name="product_Price" required>

<label for="description">Description: </label>
<textarea name="product_Description"></textarea>

<label for="product_Image">Product Image: </label>
<input type="file" name="product_Image" accept=".jpg, .jpeg, .png" required>

<label for="quantity">Left In Stock: </label>
<input type="number" name="product_Quantity" required>

<button type="submit"> Add Product </button>
</form>
 </section>


<!-- Update. -->
 <section class="updateProduct">
<form action="../../backend/CRUD/CRUD.php" method="POST">
<input type="hidden" name="action" value="update">

<h2> Update Product </h2>

<label for="name">Product Name: </label>
<input type="text" name="product_Name" required>

<label for="price">Price: </label>
<input type="number" name="product_Price" required>

<label for="description">Description: </label>
<textarea name="product_Description"></textarea>

<label for="quantity">Left In Stock: </label>
<input type="number" name="product_Quantity" required>

<label for="product_Id">Product ID:</label>
<input type="number" name="product_Id" required>

<button type="submit"> Update Product </button>
</form>
 </section>


<!-- Delete -->
 <section class = "deleteProduct">
    <form action="../../backend/CRUD/CRUD.php" method="POST">
<input type="hidden" name="action" value="delete">

<h2> Delete Product </h2>

<label for="name">Product Name: </label>
<input type="text" name="product_Name" required>

<label for="product_Id">Product ID:</label>
<input type="number" name="product_Id" required>

<button type="submit"> Delete Product </button>
</form>
 </section>
 </section>

<?php include "../../backend/globals/footer.php" ?>

</body>



