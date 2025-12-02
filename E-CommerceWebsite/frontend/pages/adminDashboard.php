<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
} else {
    if($_SESSION['role'] != 'admin') {
    die('Access Denied.');
}
}


require_once("../../backend/CRUD/config.php");
require_once("../../backend/CRUD/CRUD.php");

$database = new Database();
$db = $database->getConnection();

$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($searchTerm) {
    $stmt = $db->prepare("SELECT * FROM Products WHERE product_Name LIKE ? ORDER BY product_Name ASC");
    $stmt->execute(["%$searchTerm%"]);
} else {
    $stmt = $db->prepare("SELECT * FROM Products ORDER BY product_Name ASC");
    $stmt->execute();
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<script>
function openUpdatePopup() {
  document.getElementById('updatePopup').classList.remove('popupHidden');
  document.getElementById('updatePopup').classList.add('popupVisible');
}

function closeUpdatePopup() {
  document.getElementById('updatePopup').classList.remove('popupVisible');
  document.getElementById('updatePopup').classList.add('popupHidden');
}


function openDeletePopup() {
  document.getElementById('deletePopup').classList.remove('popupHidden');
  document.getElementById('deletePopup').classList.add('popupVisible');
}

function closeDeletePopup() {
  document.getElementById('deletePopup').classList.remove('popupVisible');
  document.getElementById('deletePopup').classList.add('popupHidden');
}

function openCreatePopup() {
    document.getElementById('createPopup').classList.remove('popupHidden');
    document.getElementById('createPopup').classList.add('popupVisible');
}

function closeCreatePopup() {
  document.getElementById('createPopup').classList.remove('popupVisible');
  document.getElementById('createPopup').classList.add('popupHidden');
}

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Clothing. Mens. Womens. Workers. Work. Boots. Shoes. Sandals. Top. Bottom. Tops. Bottoms.">
    <meta name="robots">

<!-- This is a massive nuisance with the cache busting, I was so lost for so long as to why it wasnt updating despite being properly linked,
 spent too long here on the dumbest thing. -->

    <link rel="stylesheet" href="../css/style.css?=v4">
    <title>E-Commerce Website</title>

</head> 
<body>

<?php include "../../backend/globals/header.php"; ?>


<section class = adminDashboard>
    <form method="GET" class="adminSearchBar">
        <h1>Search Database</h1>
        <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($searchTerm); ?>">
      <button type="submit">Search</button>
      <button type="button" onclick="openCreatePopup()">Create</button>
    </form>

    <section class = "adminProductView">
        <?php foreach($products as $product) : ?>
            <section class = "adminProductCards">
            <img src="<?php echo htmlspecialchars($product['product_Image']); ?>" alt="<?php echo htmlspecialchars($product['product_Name']); ?>" 
                    class = "productImage">

                    <h2 class = "itemName"><?php echo htmlspecialchars($product['product_Name']); ?></h2>
                    <p class="itemType"><?php echo htmlspecialchars($product['product_Description']); ?> </p>
                    <p class = "productId">P#:  <?php echo htmlspecialchars($product['product_Id']); ?></p>
                    
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice">$<?php echo number_format($product['product_Price'], 2); ?></p>
                    <p class = "stock">Left In Stock: <?php echo htmlspecialchars($product['product_Quantity']); ?></p>
            <div class = "adminCRUDButtons">
                <button type="button" onclick="openUpdatePopup()">Update</button>
                <button type="button" onclick="openDeletePopup()">Delete</button>
                <button type="button"  > <a href="dedicatedView.php?id=<?php echo $product['product_Id']; ?>">View</a></button>
            </div>
        </section>
        <?php endforeach; ?> 
    </section>


<!-- Create -->
 <section id="createPopup" class="popupHidden">
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
        <button type="button" onclick="closeCreatePopup()">Cancel</button>
        </form>
    </section>
</section>



<!-- Update. -->
<section id="updatePopup" class="popupHidden">
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
        <button type="button" onclick="closeUpdatePopup()">Cancel</button>
        </form>
    </section>
</section>



<!-- Delete -->
<section id="deletePopup" class="popupHidden">
    <section class = "deleteProduct">
        <form action="../../backend/CRUD/CRUD.php" method="POST">
        <input type="hidden" name="action" value="delete">

        <h2> Delete Product </h2>

        <label for="name">Product Name: </label>
        <input type="text" name="product_Name" required>

        <label for="product_Id">Product ID:</label>
        <input type="number" name="product_Id" required>

        <button type="submit"> Delete Product </button>
        <button type="button" onclick="closeDeletePopup()">Cancel</button>
        </form>
    </section>   
</section>

</section>

<?php include "../../backend/globals/footer.php" ?>

</body>



