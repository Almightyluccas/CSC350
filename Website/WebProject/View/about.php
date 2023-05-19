<?php 
include_once('checker.php'); 
?>

<!Doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="view/css/confetti_cuisine.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <title>Document</title>


<style type="text/css">

#title {
  color : white;
  font-size: 30px;
}

.button {
  background: black;
  font-size: 15px;
}

body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      background-image: url(p2.jpeg);
      background-repeat: no-repeat;
      background-size: 55% 100%;
    }

.container {
      max-width: 800px;
      margin: 0 auto;
      padding: 130px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
      margin-right: -22px;
    }

h1 {
     text-align: center;
     color: black;
    }

p {
      margin-bottom: 20px;
      font-size: 18px;
    }

.mission-statement {
      font-weight: bolder;
      font-size: 20px;
    }

#point {
     position: absolute;
     top: 18%;
     left: 45%;
     transform: translate(-50%, -50%);
     font-size: 45px;
}



  </style>

</head>
      <body style="background-color: white">

      <div id="nav" style="background:black ;color:white;">
      <div class="col-sm nav-align"><h1 id="title">Elite Sneakers</h1></div>
      <div class="col-sm nav-align">

        <?php include('menu.php'); ?>
      
      </div>
    </div>

<center>  
<div style='width:600px' id="menu">
<table align=center>
<tr>
      
</tr>
</table>
</div>
</center>
<h1 id="point"><b> Sneaker Chronicles: Unveiling the Footwear Revolution </b></h1><br>
<center>

     <div class="container">
     <h1><b> Our Story </b></h1>
     <br>
    <p>Welcome to Your Elite Sneakers, where every step is a statement. We are dedicated to curating a collection of sneakers that represents the pinnacle of style, innovation, and self-expression.</p>
    <p> At Your Elite Sneakers, we believe that sneakers are more than just footwear. They are a powerful form of art, culture, and personal identity. We strive to provide sneaker enthusiasts like you with a platform to explore and celebrate the world of sneakers. </p>
    <br>
    <p class="mission-statement">Our mission is to fuel your sneaker passion by offering a handpicked selection of the most sought-after sneakers in the industry. From iconic classics to cutting-edge collaborations, we are committed to delivering the ultimate sneaker experience.</p>
    <br>
    <p> With a team of passionate sneaker enthusiasts, we understand the thrill of finding that perfect pair. We meticulously curate our collection to ensure that every sneaker we offer embodies quality, authenticity, and the latest trends.</p>
    <p> At Your Elite Sneakers, customer satisfaction is at the heart of everything we do. We strive to provide exceptional service, from seamless online shopping to prompt and reliable delivery, ensuring that your sneaker journey is nothing short of extraordinary. </p>
    <p> Join our vibrant community of sneaker enthusiasts, where you can connect, share, and immerse yourself in the world of sneakers. We foster a space that celebrates diversity, creativity, and the shared love for this global phenomenon. </p>
    <p>Whether you're a seasoned collector or just beginning your sneaker journey, trust Your Sneaker Paradise to be your go-to destination for all things sneakers. Step into a world of limitless possibilities and elevate your style with our carefully curated selection.</p>
    <p>Your search for the perfect sneakers ends here. Explore our handpicked range of sneakers that transcend boundaries and inspire confidence. Experience the thrill of standing out from the crowd and making a statement with every step. </p>
</center>
     
</body>
</html>
