<?php
# Canot do squat without this, it calls everything neccessary for the database to read, and return as well as populate the stuff well be doing ahead
# within the actual php integration into the html.

require_once("../../backend/CRUD/config.php");
require_once("../../backend/CRUD/CRUD.php");

$database = new Database();
$db = $database->getConnection();
$crud = new CRUD($db);

# Fetchs everything.

$stmt = $db->query("SELECT * FROM Products ORDER BY product_Id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Clothing. Mens. Womens. Workers. Work. Boots. Shoes. Sandals. Top. Bottom. Tops. Bottoms.">
    <meta name="robots">
    <link rel="stylesheet" href="../css/style.css"></link>
    <title>E-Commerce Website</title>

</head>
<body>
   <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\header.php"; ?>
    <main>
        <section class = "shopBanner">
            <h1> Spooktober Flash Sale! </h1>
            <h3>Discounts up to 20% off</h3>
            <div class="dividerShopPage"></div>

        </section>

        <section class = "shop">
            <?php foreach ($prodcuts as $product): ?>
                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="<?php echo htmlspecialchars($product['product_Image']); ?>" alt="<?php echo htmlspecialchars($product['product_Name']); ?>" 
                    class = "productImage">
                    <p class="itemType"><?php echo htmlspecialchars($product['product_Description']); ?> </p>
                    <h3 class = "itemName"><?php echo htmlspecialchars($product['product_Name']); ?></h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"><?php echo number_format($product['product_Price']); ?></p>
                    <p class = "stock"><?php echo htmlspecialchars($product['product_Quantity']); ?></p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div> 
                <?php endforeach; ?>
        </section>


    </main>
        <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\\footer.php" ?>
</body>
</html>