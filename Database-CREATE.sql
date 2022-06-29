/* reset database */
DROP DATABASE computerstore IF EXISTS;

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
	`desc` varchar(500) DEFAULT NULL,
	type enum('laptop', 'desktop'),
	price decimal(10,2) NOT NULL,
	CPUid int NOT NULL,
	GPUid int NOT NULL,
	memoryID int NOT NULL,
	storageID int NOT NULL,
	screenID int NOT NULL,
	imageUrl varchar(200) NULL,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_GPU (
	id int NOT NULL AUTO_INCREMENT,
	`desc` varchar(255) NOT NULL,
	memory int DEFAULT NULL,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_CPU (
	id int NOT NULL AUTO_INCREMENT,
	`desc` varchar(255) NOT NULL,
	clockSpeed decimal(3,1) NOT NULL,
	coreCount int NOT NULL,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_memory (
	id int NOT NULL AUTO_INCREMENT,
	`desc` varchar(255) NOT NULL,
	memory int NOT NULL,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_storage (
	id int NOT NULL AUTO_INCREMENT,
	`desc` varchar(255) NOT NULL,
	capacity int NOT NULL,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE spec_screen (
	id int NOT NULL AUTO_INCREMENT,
	`desc` varchar(255) NOT NULL,
	size decimal(3,1) DEFAULT NULL,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE orders (
	id int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL,
	status enum('in cart','purchased'),
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE order_details (
	id int NOT NULL AUTO_INCREMENT,
	productID int NOT NULL,
	orderID int NOT NULL,
	quantity int NOT NULL DEFAULT 1,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE favorite_lists (
	id int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL,
	dateCreated datetime DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
);

USE computerstore;
CREATE TABLE favorites (
	id int NOT NULL AUTO_INCREMENT,
	listID int NOT NULL,
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

ALTER TABLE favorite_lists ADD CONSTRAINT FK_FavoriteLists_Users FOREIGN KEY (userID) REFERENCES users(id);

ALTER TABLE favorites ADD CONSTRAINT FK_Favorites_FavoriteLists FOREIGN KEY (listID) REFERENCES favorite_lists(id);
ALTER TABLE favorites ADD CONSTRAINT FK_Favorites_Products FOREIGN KEY (productID) REFERENCES products(id);