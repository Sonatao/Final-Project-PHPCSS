<?php
session_start();
if($_SESSION['role'] != 'admin') {
    die('Access Denied.');
}
?>
<link rel="stylesheet" href="../css/style.css"></link>
<?php include "../../backend/globals/header.php"; ?>

<!-- Create -->
 <section class = "createProduct">
    <form class= "createForm" action="../../backend/CRUD/CRUD.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="action" value="create">

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

<label for="name">Product Name: </label>
<input type="text" name="product_Name" required>

<label for="product_Id">Product ID:</label>
<input type="number" name="product_Id" required>

<button type="submit"> Delete Product </button>
</form>
 </section>
 

<?php include "../../backend/globals/footer.php" ?>
