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
    <link href="https://fonts.googleapis.com/css2?family=Story+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css"></link>
    <script src="/Final Project PHPCSS/E-CommerceWebsite/frontend/jsAnimations/heroCarousel.js" defer></script>
       
    
    <title>E-Commerce Website</title>

</head>
<?php include "../../backend/globals/header.php"; ?>
<body>
    <!-- Escape characters are a trial by fire, im glad I remembered regex, the \xammp was not reading as \xamp but just mmp, used a \\ double and it worked. -->
    
    <main>
        <section id = "heroCarousel">
            <!-- Add a Carousle here with random images pulled from database and a cta that sits on top. i.e, "Summer Sales!" or smth like that. Within the blurb 
             for summer sales, and the other titles, add a cta that says, "Make an account today, and get 10% off your first purchase" or something like that,
             have it link back to the register page.  -->
                <div class ="heroSlides fade">
                    <div class = "heroText">
                        <h2> Bringing the fear? </h2>
                        <p> With nearly one hundred years of haunting experience there isn't anyone we can't scare!
                            When you sign up with us, get a 20% coupon on any select products!</p>
                        <a href="register.php"> Register Here </a>
                    </div>

                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" class = "heroImages">
                </div>

                <div class ="heroSlides fade">
                    <div class = "heroText">
                        <h2> Bringing the fear? </h2>
                        <p> With nearly one hundred years of haunting experience there isn't anyone we can't scare,
                            when you sign up with us, get a 20% coupon on any select products!</p>
                            <a href="register.php"> Register </a>
                    </div>
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS2.jpg" class = "heroImages">
                </div>

                <div class ="heroSlides fade">
                    <div class = "heroText">
                       <h2> Bringing the fear? </h2>
                        <p> With nearly one hundred years of haunting experience there isn't anyone we can't scare,
                            when you sign up with us, get a 20% coupon on any select products!</p>
                            <a href="register.php"> Register </a>
                    </div>
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS3.avif" class = "heroImages">
                </div>

                <a class = "previous" onclick="advanceSlides(-1)">&#10094;</a>
                <a class = "next" onclick="advanceSlides(1)">&#10095;</a>
        </section>

        <!-- <div class = "heroDots">
            <span class="slideDot" onclick="currentSlide(1)"></span>
            <span class="slideDot" onclick="currentSlide(2)"></span>
            <span class="slideDot" onclick="currentSlide(3)"></span>
        </div> -->

        <section id="homeShopContainer">
            <section class = "headingContainer">
                <div class="homeShopHeading"><h2> Explore the Dark </h2></div>
                <div class="homeShopSubHeading"><h3>Sales on select items up to 20% off</h3></div>
                <div class ="divider"></div>
            </section>
        </section>

            <section class = "homeShop">

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Iron Mask</h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> $20,000.00 </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

               <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>
                    

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

                <div class = "shopItems"> <!-- 5 Rows 3 Columns -->
                    <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy" class = "productImage">
                    <p class="itemType">Autofill Item Filters ie, women fashion, luxury etc</p>
                    <h3 class = "itemName"> Test Text for the Product Name Display </h3>
                    <div class = "productCardDivider"></div>
                    <p class = "itemPrice"> Pricing Information </p>

                    <div class = "productButtonGroup">
                     <button type="button" > View </button>
                     <button type="button" > Add To Cart </button>
                     <button type="button" > Favorite </button>   
                    </div>
                </div>

            </section>

            <section id="aboutUs">
                <img src="/Final Project PHPCSS/E-CommerceWebsite/assets(temp)/TestImagePHPCSS.jpg" alt="A really cool guy">
                <h3>Who We Are</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor excepturi voluptates 
                    quisquam soluta nihil voluptatem quod placeat! Animi sint delectus illo veniam. Aut obcaecati 
                    eum fugiat consectetur praesentium eius provident.</p>
            </section>
               
    </main>

    
        <?php include "../../backend/globals/footer.php" ?>
</body>
</html>