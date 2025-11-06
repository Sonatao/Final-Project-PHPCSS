CREATE DATABASE IF NOT EXISTS Commerce;

CREATE TABLE IF NOT EXISTS Products (
Product_id INT AUTO_INCREMENT,
Product_name VARCHAR(255) NOT NULL,
Product_price INT NOT NULL,
Product_description VARCHAR(1000),
Purchase_date DATE
PRIMARY KEY(Product_id)
);

CREATE Table IF NOT EXISTS adminInfo (
    admin_Id int NOT NULL AUTO_INCREMENT,
    admin_Name VARCHAR(255) NOT NULL,
    admin_Password varchar(255) NOT NULL,
    PRIMARY KEY(admin_id)
);

