CREATE DATABASE csc350 ;
USE csc350 ;

CREATE TABLE users (
  username VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL,
  customer_id INT PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE products (
  product_id INT PRIMARY KEY AUTO_INCREMENT,
  product_name VARCHAR(100) NOT NULL,
  description VARCHAR(250) NOT NULL,
  price DECIMAL(13, 2) NOT NULL,
  image_url VARCHAR(255) NOT NULL
);


CREATE TABLE cart (
  cart_id INT PRIMARY KEY AUTO_INCREMENT,
  customer_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT(11) NOT NULL,
  total_Price DECIMAL(13, 3) NOT NULL,
  FOREIGN KEY(product_id) REFERENCES products(product_id),
  FOREIGN KEY(customer_id) REFERENCES users(customer_id)
);

INSERT INTO products VALUES(
'001',
'Air Jordan 4 Retro Thunder',
'The 2023 Air Jordan 4 Retro Thunder is a re-release of the popular shoe originally launched in 2006.
The upper is made of black nubuck with yellow accents on the eyelets, quarter panel, and lower tongue. 
The shoe features Jumpman branding on the tongue tag and heel tab. 
It has a lightweight yellow polyurethane midsole with a visible Air-sole unit in the heel for cushioning.',
'150','');
INSERT INTO products VALUES();
INSERT INTO products VALUES();
INSERT INTO products VALUES();
INSERT INTO products VALUES();
