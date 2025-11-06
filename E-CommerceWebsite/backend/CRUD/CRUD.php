<?php 

require_once ("../config.php");

// ^^^^^ Neccessary Imports Above Here ^^^^^

// Create Stuff Below 

$sql = "CREATE DATABASE IF NOT EXISTS Commerce";
if($conn->query($sql)) {
     echo "Database created "
} else {
    echo "Error, Database Could not be Created: " . $conn->error;
};

$conn->close();

?>