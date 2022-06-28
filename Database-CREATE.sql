/* DB creation */
CREATE DATABASE computerstore;

/* Table creation */
USE computerstore;
CREATE TABLE users (
	id int NOT NULL AUTO_INCREMENT,
	email varchar(255) NOT NULL,
	userName varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	creditCard varchar(255) DEFAULT NULL,
	address varchar(255) DEFAULT NULL,
	city varchar(100) DEFAULT NULL,
	postalCode varchar(20) DEFAULT NULL,
	isBlocked tinyint DEFAULT 0,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE products (
	id int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	desc varchar(500) DEFAULT NULL,
	type enum('laptop', 'desktop', 'tablet'), /*potentially more/less categories*/
	price decimal(10,2) NOT NULL,
	CPUid int NOT NULL,
	GPUid int NOT NULL,
	memoryID int NOT NULL,
	storageID int NOT NULL,
	screenID int NOT NULL, /*probably better to have an id for 'no screen' in the lookup table rather than using NULL here*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_GPU (
	id int NOT NULL AUTO_INCREMENT,
	desc varchar(255) NOT NULL, /*should maybe use a numeric type for some specs, so that values can be compared in search filters etc..*/ 
								/*should have an option here for 'no discrete GPU' or similar*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_CPU (
	id int NOT NULL AUTO_INCREMENT,
	desc varchar(255) NOT NULL, /*should maybe use a numeric type for some specs, so that values can be compared in search filters etc..*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_memory (
	id int NOT NULL AUTO_INCREMENT,
	desc varchar(255) NOT NULL, /*should maybe use a numeric type for some specs, so that values can be compared in search filters etc..*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_storage (
	id int NOT NULL AUTO_INCREMENT,
	desc varchar(255) NOT NULL, /*should maybe use a numeric type for some specs, so that values can be compared in search filters etc..*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_screen (
	id int NOT NULL AUTO_INCREMENT,
	desc varchar(255) NOT NULL, /*should maybe use a numeric type for some specs, so that values can be compared in search filters etc..*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE orders (
	id int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL,
	status enum('in cart', 'pending', 'purchased'), /*not sure about this column as far as implementation and values that we will need*/
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE order_details (
	id int NOT NULL AUTO_INCREMENT,
	productID int NOT NULL,
	orderID int NOT NULL,
	quantity int NOT NULL DEFAULT 1,
	PRIMARY KEY(id);
);

USE computerstore;
CREATE TABLE favorites (
	id int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL,
	productID int NOT NULL,
	dateAdded datetime DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
);

/* Foreign Keys */
USE computerstore;

ALTER TABLE products ADD CONSTRAINT FK_Prod_GPU FOREIGN KEY (GPUid) REFERENCES spec_GPU(id);
ALTER TABLE products ADD CONSTRAINT FK_Prod_CPU FOREIGN KEY (CPUid) REFERENCES spec_CPU(id);
ALTER TABLE products ADD CONSTRAINT FK_Prod_Memory FOREIGN KEY (memoryID) REFERENCES spec_memory(id);
ALTER TABLE products ADD CONSTRAINT FK_Prod_Storage FOREIGN KEY (storageID) REFERENCES spec_storage(id);
ALTER TABLE products ADD CONSTRAINT FK_Prod_Screen FOREIGN KEY (screenID) REFERENCES spec_screen(id);

ALTER TABLE orders ADD CONSTRAINT FK_Orders_Users FOREIGN KEY (userID) REFERENCES users(id);

ALTER TABLE order_details ADD CONSTRAINT FK_OrderDetails_Products FOREIGN KEY (productID) REFERENCES products(id);
ALTER TABLE order_details ADD CONSTRAINT FK_OrderDetails_Orders FOREIGN KEY (orderID) REFERENCES orders(id);

ALTER TABLE favorites ADD CONSTRAINT FK_Favorites_Users FOREIGN KEY (userID) REFERENCES users(id);
ALTER TABLE favorites ADD CONSTRAINT FK_Favorites_Products FOREIGN KEY (productID) REFERENCES products(id);