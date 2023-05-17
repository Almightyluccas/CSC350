CREATE DATABASE csc350 ;

USE csc350 ;

CREATE TABLE users (
  customerId INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL
);


CREATE TABLE products (
  productId INT PRIMARY KEY AUTO_INCREMENT,
  productName VARCHAR(100) NOT NULL,
  description VARCHAR(250) NOT NULL,
  price DECIMAL(13, 2) NOT NULL,
  imageUrl VARCHAR(255) NOT NULL
);


CREATE TABLE cart (
  cartId INT PRIMARY KEY AUTO_INCREMENT,
  customerId INT NOT NULL,
  productId INT NOT NULL,
  quantity INT(11) NOT NULL,
#   switch price to total price
  price DECIMAL(13, 3) NOT NULL,
  FOREIGN KEY(productId) REFERENCES products(productId),
  FOREIGN KEY(customerId) REFERENCES users(customerId)
);


