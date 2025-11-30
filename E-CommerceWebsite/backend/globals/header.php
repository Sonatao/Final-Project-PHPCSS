<?php 
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<script src="/Final Project PHPCSS/E-CommerceWebsite/frontend/jsAnimations/sideNav.js" defer></script>
<header class = "header">
    
<div id= "SideNav" class="sideNav">
            <a href="javascript:void(0)" class="closeButton" onclick="closeNav()">&times;</a>
            <a href="home.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">About Us</a>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="/Final Project PHPCSS/E-CommerceWebsite/frontend/pages/adminDashboard.php">Admin</a>
                    <?php endif; ?>
        </div>
        <span class = "openSideNav" onclick="openNav()">=</span>

        <nav>
            <ul class = "headerItems">
                <a href="home.php"> Home </a>
                <a href="shop.php"> Products </a>
                <a href="contact.php"> Contact </a>
                <a href="about.php">About Us</a>
                <a href="register.php"> Register </a>
                <a href="login.php"> Login </a>
            </ul>
            </nav>
    </header>