<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Clothing. Mens. Womens. Workers. Work. Boots. Shoes. Sandals. Top. Bottom. Tops. Bottoms.">
    <meta name="robots">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Quintessential&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css"></link>
    <script src="/Final Project PHPCSS/E-CommerceWebsite/frontend/jsAnimations/heroCarousel.js" defer></script>
    <title>E-Commerce Website</title>

</head>
<body>
    <!-- Escape characters are a trial by fire, im glad I remembered regex, the \xammp was not reading as \xamp but just mmp, used a \\ double and it worked. -->
    <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\header.php"; ?>

    <main>
        <section id = "heroCarousel">
            <!-- Add a Carousle here with random images pulled from database and a cta that sits on top. i.e, "Summer Sales!" or smth like that. Within the blurb 
             for summer sales, and the other titles, add a cta that says, "Make an account today, and get 10% off your first purchase" or something like that,
             have it link back to the register page.  -->
                <div class ="heroSlides fade">
                    <div class = "heroText">
                        <h2></h2>
                    </div>

                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" class = "heroImages">
                </div>

                <div class ="heroSlides fade">
                    <div class = "heroText">
                        <h2></h2>
                    </div>
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS2.jpg" class = "heroImages">
                </div>

                <div class ="heroSlides fade">
                    <div class = "heroText">
                        <h2></h2>
                    </div>
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS3.avif" class = "heroImages">
                </div>

                <a class = "previous" onclick="advanceSlides(-1)">&#10094;</a>
                <a class = "next" onclick="advanceSlides(1)">&#10095;</a>
        </section>

        <div class = "heroDots">
            <span class="slideDot" onclick="currentSlide(1)"></span>
            <span class="slideDot" onclick="currentSlide(2)"></span>
            <span class="slideDot" onclick="currentSlide(3)"></span>
        </div>

        <section id="homeShopContainer">

            <section class = "headingContainer">
                <div class="homeShopHeading"><h2> Explore the Dark </h2></div>
                <div class="homeShopSubHeading"><h3>Sales on select items up to 20% off</h3></div>
            </section>
            
            <section class = "homeShop">
                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <p class = "itemPrice"> Pricing Information </p>
                    <p> Small blurb about the item </p>
                    <button type="button" class = "productCardButton"> View </button>
                    <button type="button" class = "productCardButton"> Add To Cart </button>
                    <button type="button" class = "productCardButton"> Favorite </button>
                </div>

            </section>
        </section>
        
        <section id = "backToTop">
            <h2> You've reached the end </h2>
            <p> Back to top </p>
        </section>
               
    </main>

    <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\\footer.php" ?>

</body>
</html>