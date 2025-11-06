<?php 

$servername = "localhost";
$username = "tempName";
$password = "tempPassword";
$dbname = "Commerce";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Succesfully";
} catch (PDOException $e) {
    echo "Connection Failed due to : ". $e->getMessage();
}

// ^^^^^ Basic Connection stuff above. ^^^^^




?>

