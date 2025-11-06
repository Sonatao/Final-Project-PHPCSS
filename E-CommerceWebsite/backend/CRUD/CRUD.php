<?php 

require_once ("../config.php");

// ^^^^^ Neccessary Imports Above Here ^^^^^

// Create Stuff Below 

$conn = "CREATE DATABASE IF NOT EXISTS Commerce";

if($conn->query($conn)) {
     echo "Database created";
} else {
    echo "Error, Database Could not be Created: " . $conn->error;
};



?>