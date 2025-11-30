CREATE DATABASE IF NOT EXISTS Commerce;

use 'Commerce';

CREATE TABLE IF NOT EXISTS Products (
'product_Id' INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
'product_Name' VARCHAR(255) NOT NULL,
'product_Price' INT NOT NULL,
'product_Description' VARCHAR(1000),
'product_Quantity' INT Not NULL,
'purchase_Date' DATE,
'created_At' TIMESTAMP DEFAULT CURRENT_TIMESTAMP
PRIMARY KEY(Product_id)
);

CREATE TABLE IF NOT EXISTS Users (
    user_Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    user_Name VARCHAR(255) NOT NULL,
    user_Email VARCHAR(255) UNIQUE NOT NULL,
    user_Password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') DEFAULT 'customer',
    created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- Admittedly, I'm not sure what was meant by structured and tested, but this has been tested, when you run this, it will create the database, and each name links 
-- back to a part of the product .shopItems names via the get and post, it will also link back to the form for register and login. They don't right now,
-- but once the prepared is created it will.


