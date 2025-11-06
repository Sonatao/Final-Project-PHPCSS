CREATE DATABASE IF NOT EXISTS Commerce;

CREATE TABLE IF NOT EXISTS Products (
product_Id INT AUTO_INCREMENT,
product_Name VARCHAR(255) NOT NULL,
product_Price INT NOT NULL,
product_Description VARCHAR(1000),
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

CREATE Table if NOT EXISTS Inquires {
    email VARCHAR(255) not null,
    name VARCHAR(255) not null,
    phone_Number INT not null, 
    inquiry VARCHAR(500),
    PRIMARY KEY(email)
};
