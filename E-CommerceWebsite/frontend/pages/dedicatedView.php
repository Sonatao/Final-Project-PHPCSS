<?php
# Skeleton taken from shop.php
# Canot do squat without this, it calls everything neccessary for the database to read, and return as well as populate the stuff well be doing ahead
# within the actual php integration into the html.

require_once("../../backend/CRUD/config.php");
require_once("../../backend/CRUD/CRUD.php");

$database = new Database();
$db = $database->getConnection();

$product = null;
if(isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $stmt = $db->prepare("SELECT * FROM Products WHERE product_Id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(!$product) {
    die("Product not found or does not exist.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Clothing. Mens. Womens. Workers. Work. Boots. Shoes. Sandals. Top. Bottom. Tops. Bottoms.">
    <meta name="robots">
    <link rel="stylesheet" href="../css/style.css?=v2">
    <title>E-Commerce Website</title>

</head> 
<body>
    <section class = "pageWrapper">

    
    <?php include "../../backend/globals/header.php"; ?>
    <main>
    <section class = "shopSingle">
        <section class = "productImageSingle">
            <img src="<?php echo htmlspecialchars($product['product_Image']); ?>" alt=<?php echo htmlspecialchars($product['product_Name']); ?>>

        </section>

        <section class = "productDetails">     
            <h2 class = "itemNameSingle"><?php echo htmlspecialchars($product['product_Name']); ?></h2>
            <p class="itemDescription"><?php echo htmlspecialchars($product['product_Description']); ?> </p>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPriceSingle">$<?php echo number_format($product['product_Price'], 2); ?></p>
                    <p class = "stockSingle">Left In Stock: <?php echo htmlspecialchars($product['product_Quantity']); ?></p>
                    
        <div class = "productButtonGroupSingle">
            <button type="button" > <a href="">Add To Cart </a></button>
            <button type="button" > <a href="">Favorite </a></button>   
        </div>
        </section>

        

    </section>   
    </main>
    <?php include "../../backend/globals/footer.php"; ?>
</section>
</body>