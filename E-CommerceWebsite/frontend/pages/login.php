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
    <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\header.php"; ?>

    <main>
        <section id = "registrationForm">
            <h1> Sign In </h1>

            <label for="email">Email</label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

        </section> 

        <div id = "signInRedirect">
            <p> Don't have an account yet? <a href="register.php"> Create an account </a></p>
        </div>
              
    </main>

        <?php include "C:\\xampp\htdocs\Final Project PHPCSS\E-CommerceWebsite\backend\globals\\footer.php" ?>


</body>
</html>