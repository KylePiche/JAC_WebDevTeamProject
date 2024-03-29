/*INSERT INTO table1 (field1, field2) VALUES (value1, value2);*/
use computerstore;



INSERT INTO spec_GPU (`desc`, memory) VALUES
 ("Integrated Graphics", null),
 ("RTX 3090Ti", 16),
 ("RTX 2080M", 10),
 ("Aoreus GPU 2495", 5);
 
INSERT INTO spec_CPU (`desc`, clockSpeed, coreCount) VALUES
 ("Intel Core i9 12900K", 4.4, 14),
 ("AMD Ryzen 5 5700M", 4, 12),
 ("Intel 6756 Mobile", 3.5, 8);
 
INSERT INTO spec_memory (`desc`, memory) VALUES
 ("64GB DDR5 RAM (5000Mhz)", 64),
 ("32GB DDR4 RAM (2300Mhz)", 32),
 ("12GB DDR4 RAM (3000Mhz)", 12);
 
INSERT INTO spec_storage (`desc`, capacity) VALUES
 ("2TB NVMe M.2", 2000),
 ("500GB SSD SATA", 500),
 ("128GB Storage", 128);
 
INSERT INTO spec_screen (`desc`, size) VALUES
 ("No Screen", null),
 ("15 inch display 1080p", 15),
 ("10 inch 1440p display", 10);
 
 INSERT INTO products (`name`, `desc`, `type`, price, imageUrl, CPUid, GPUid, memoryID, storageID, screenID) VALUES
("Ultimus Gaming PC", "Dominate the playing field with this top of the line gaming PC.", "desktop", "2000.99", "placeholderURL", 1, 2, 1, 1, 1),
("Ultimus Gaming Laptop", "Dominate the playing field on the go with this top of the line gaming laptop.", "laptop", "2200.99", "placeholderURL", 2, 3, 2, 2, 2),
("Ultimus Work Laptop", "Dominate the office space with this top of the line workstation laptop.", "laptop", "1800.99", "placeholderURL", 3, 4, 3, 3, 3);

/*Users*/

INSERT INTO users (email, userName, password, creditCard, address, city, postalCode) VALUES
("bobby_smith@hotmail.com", "user1", "e10adc3949ba59abbe56e057f20f883e", "1234567891234567", "555 first ave.", "Montreal", "H0H0H0"),
("val_nichushkin@gmail.com", "user2", "e10adc3949ba59abbe56e057f20f883e", "9876543219876543", "123 second ave.", "Montreal", "H1H1H1"),
("CCaufield@yahoo.ca", "user3", "e10adc3949ba59abbe56e057f20f883e", "0123456789012345", "456 Molson St.", "Montreal", "H2H2H2");

INSERT INTO orders (userID, status) VALUES
("1", "in cart"),
("2", "in cart"),
("3", "in cart"),
("4", "in cart")

INSERT INTO order_details (productID, orderID, quantity) VALUES
("1", "1", "1"),
("2", "2", "1"),
("3", "3", "1")