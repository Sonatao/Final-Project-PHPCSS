<?php
session_start();
if($_SESSION['role'] != 'admin') {
    die('Access Denied.');
}
?>

<!-- Create -->
<form action="../../backend/CRUD/CRUD.php" method="POST" enctype="multipart/form-data">
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


<!-- Update. -->
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

<button type="submit"> Add Product </button>

<!-- Delete -->
 <form action="../../backend/CRUD/CRUD.php" method="POST">
<input type="hidden" name="action" value="delete">

<label for="name">Product Name: </label>
<input type="text" name="product_Name" required>

<label for="price">Price: </label>
<input type="number" name="product_Price" required>

<label for="description">Description: </label>
<textarea name="product_Description"></textarea>

<label for="quantity">Left In Stock: </label>
<input type="number" name="product_Quantity" required>

<button type="submit"> Add Product </button>

</form>