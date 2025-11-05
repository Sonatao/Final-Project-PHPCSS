<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Clothing. Mens. Womens. Workers. Work. Boots. Shoes. Sandals. Top. Bottom. Tops. Bottoms.">
    <meta name="robots">
    <link rel="stylesheet" href="E-CommerceWebsite/frontend/css/style.css"></link>
    <title>E-Commerce Website</title>

</head>
<body>
    <!-- Escape characters are a trial by fire, im glad I remembered regex, the \xammp was not reading as \xamp but just mmp, used a \\ double and it worked. -->
    <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\header.php"; ?>

    <main>
        <section id = "hero">
            <!-- Add a Carousle here with random images pulled from database and a cta that sits on top. i.e, "Summer Sales!" or smth like that. Within the blurb 
             for summer sales, and the other titles, add a cta that says, "Make an account today, and get 10% off your first purchase" or something like that,
             have it link back to the register page.  -->
        </section>

        <section class = "featureCards">
            <!-- Think of the amazon featured cards, rebuild and add here , keep clean and consistent, but make them a bit larger, center text, etc. Each card, 
             should link to a dedicated shop page for that item, think amazon.  -->
        </section>

        <section class = "featureCarousel">
            <!-- Can be reused. Create carousel here that features all the featured products. Each product links back to it's own page. -->
        </section>

        <section class = "fireSale">
            <!-- Reuse the feature cards but swap it up, instead of individual items as in feature cards, use industries, ie, "Tech", "Outdoors" etc, 
             for the cards title and interior clickable images that will link to the page with that being displayed. -->
        </section>

        <section id = "outdoorsCarousel">
            <!-- Features outdoor items. Links back to individual pages, make the word outdoors clickable to go to the full shop page -->
        </section>
        
        <section id = "forHer">
            <!-- Female targetted products. Image links to shop page, and individual pages. -->
        </section>

        <section id = "forHim">
            <!-- Male targetted products. Parameters same as female section parameters. -->
        </section>

        <section id = "backToTop">
            <h2> You've reached the end </h2>
            <p> Back to top </p>
        </section>
               
    </main>

    <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\\footer.php" ?>

</body>
</html>