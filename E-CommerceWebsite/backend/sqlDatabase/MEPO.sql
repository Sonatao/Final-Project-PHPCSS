CREATE DATABASE IF NOT EXISTS Commerce;

CREATE TABLE IF NOT EXISTS Products (
product_Id INT AUTO_INCREMENT,
product_Name VARCHAR(255) NOT NULL,
product_Price INT NOT NULL,
product_Description VARCHAR(1000),
product_Quantity INT Not NULL,
purchase_Date DATE,
PRIMARY KEY(Product_id)
);

CREATE Table IF NOT EXISTS adminInfo (
    admin_Id int NOT NULL AUTO_INCREMENT,
    admin_Name VARCHAR(255) NOT NULL,
    admin_Password varchar(255) NOT NULL,
    PRIMARY KEY(admin_id)
);

CREATE Table if not exists guestInfo (
    guest_id int not null AUTO_INCREMENT,
    guest_Name VARCHAR(255),
    guest_Password VARCHAR(255),
    guest_Email VARCHAR(255),
    PRIMARY KEY(guest_id)
);


-- Admittedly, I'm not sure what was meant by structured and tested, but this has been tested, when you run this, it will create the database, and each name links 
-- back to a part of the product .shopItems names via the get and post, it will also link back to the form for register and login. They don't right now,
-- but once the prepared is created it will.


