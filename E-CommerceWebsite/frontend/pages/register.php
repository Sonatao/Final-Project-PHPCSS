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
    <?php include "../../backend/globals/header.php"; ?>
    <main>
        <form action="../../backend/CRUD/CRUD.php" method="POST">
           <section id = "registrationForm">
            <h1> Registration </h1>

            <input type="hidden" name="action" value="register">

            <label for="name">Name:</label>
            <input type="text" placeholder="Enter Name" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <label for="repeatPassword">Repeat Password:</label>
            <input type="password" placeholder="Repeat Password" name="repeatPassword" id="repeatPassword">
        
            <button type="Submit">Login</button>
            <button type="button">Cancel</button>
            
        <div id="signInRedirect">
            <p> Already have an account? <a href="login.php"> Sign In </a></p>
        </div> 
        </section> 
        
        
        </form>
        
    </main>
        <?php include "../../backend/globals/footer.php" ?>
</body>
</html>