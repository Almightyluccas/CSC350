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
  description VARCHAR(500) NOT NULL,
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


INSERT INTO products(productName,description,price,imageUrl) VALUES(
'Air Jordan 4 Retro Thunder',
'The 2023 Air Jordan 4 Retro Thunder is a re-release of the popular shoe originally launched in 2006.
The upper is made of black nubuck with yellow accents on the eyelets, quarter panel, and lower tongue.',
'150','view/images/001.png')
,(
'Air Jordan 1 Retro High OG Skyline',
'The Air Jordan 1 Retro High OG Skyline draws inspiration from a classic image of Michael Jordan in mid-flight, set against the Chicago skyline and a dusky sky.
The shoes feature mismatched pink and lavender gradient overlays, a white leather base, and black accents on the Swoosh, collar, and lining.',
'120','view/images/002.png')
,(
'The Marvel x Air Jordan 1 Retro High OG Next Chapter',
'The Marvel x Air Jordan 1 Retro High OG Next Chapter is a collaboration tied to the film "Spider-Man: Across the Spider-Verse."
The shoe pays homage to the multidimensional Spiderman universe.',
'250','view/images/003.png')
,(
'Rick and Morty x MB.02 Adventures',
'The Rick and Morty x PUMA MB.02 Adventures is a collaboration between LaMelo Ball and the animated series.
The signature shoe features a mismatched design, with neon yellow and pink gradient on the right shoe and green and purple gradient on the left.',
'100','view/images/004.png')
,(
'Louis Vuitton x Air Force 1 Low Monogram Damier Pilot Case',
' The Louis Vuitton x Air Force 1 Low Monogram Damier Pilot Case are a collaboration between Louis Vuitton and Jordan to help the environment by recycling while making some fancy shoes.
Using old thrown away LV bags, you get all the quality of Louis Vuitton products on the go.',
'100','view/images/005.png');



UPDATE products SET imageUrl='view/images/p13.jpeg' WHERE productName='Air Jordan 4 Retro Thunder';
UPDATE products SET imageUrl='view/images/p10.jpeg' WHERE productName='Air Jordan 1 Retro High OG Skyline';
UPDATE products SET imageUrl='view/images/p11.jpeg' WHERE productName='The Marvel x Air Jordan 1 Retro High OG Next Chapter';
UPDATE products SET imageUrl='view/images/p14.jpeg' WHERE productName='Rick and Morty x MB.02 Adventures';
UPDATE products SET imageUrl='view/images/p12.jpeg' WHERE productName='Louis Vuitton x Air Force 1 Low Monogram Damier Pilot Case';







INSERT INTO products(productName,description,price,imageUrl) VALUES(
'AMEN'S AIR JORDAN 9 RETRO NRG SNEAKERBOOTS',
'The 2023 Air Jordan 4 Retro Thunder is a re-release of the popular shoe originally launched in 2006.
The upper is made of black nubuck with yellow accents on the eyelets, quarter panel, and lower tongue.',
'150','view/images/p5.jpeg')
,(
'Jordan Retro 1 High OG',
'The Air Jordan 1 Retro High OG Skyline draws inspiration from a classic image of Michael Jordan in mid-flight, set against the Chicago skyline and a dusky sky.
The shoes feature mismatched pink and lavender gradient overlays, a white leather base, and black accents on the Swoosh, collar, and lining.',
'120','view/images/p6.jpeg')
,(
'Nike Dunk Low Retro Premium',
'Created for the hardwood but taken to the streets, the 80s b-ball icon returns with premium materials that take your style to the next level. Its padded, low-cut collar lets you take your game anywhere—in comfort.',
'250','view/images/p8.jpeg')
,(
'Mens Allover Logo Triple S Sneakers',
'The first Cristobal Balenciaga house of haute couture was founded in 1919 in San Sebastian, Spain. By 1937, Paris became home to the famed couturier. In 1946, the House of Balenciaga launched its first perfume, and soon it attracted the same acclaim as the famous Balenciaga couture pieces, which are today under the skillful guidance of Creative Director Demna Gvasalia.',
'100','view/images/p9.jpeg')
,(
'Louis Vuitton x Air Force 1 Low Monogram Damier Pilot Case',
' The Louis Vuitton x Air Force 1 Low Monogram Damier Pilot Case are a collaboration between Louis Vuitton and Jordan to help the environment by recycling while making some fancy shoes.
Using old thrown away LV bags, you get all the quality of Louis Vuitton products on the go.',
'100','view/images/p7.jpeg');


