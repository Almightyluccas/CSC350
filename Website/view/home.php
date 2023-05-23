<?php
include_once('checker.php');
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1" />
<title>Confetti Cuisine</title>

<link rel="stylesheet" href="view/css/confetti_cuisine.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

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
    background: url('https://i.imgur.com/H2X4g9O.jpg') no-repeat center/cover;;
    height: 100%;
    width: 100%;
    margin-bottom:480px;
    background-size: 50% 100%;
    background-color: #ffffff;
  }

  h1 {
    color: black;
    font-weight: bold;
    font-size: 45px;
    margin-left: 50px;

  }

  h2 {
    margin-left: 140px;
    color: black;
    font-weight: bold;
    font-size: 35px;
  }

  #button {
    margin-left: 250px;
    background-color:red;
    border: none;
    color: white;
    padding: 18px 35px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    border-radius: 20px;
    font-weight: bold;
  }

  #price {
    margin-left: 290px;
    font-weight: bold;
    font-size: 20px;
    color: black;

  }

  #gat {
    margin-left: 80px;
  }

  #sale {
    margin-left: 700px;
    font-size: 30px;
    color: black;
  }

</style>
</head>

<body>

<div id="nav" style="background:black ;color:white;">
  <div class="col-sm nav-align"><h1 id="title">Elite Sneakers</h1></div>
  <div class="col-sm nav-align">

    <?php include('menu.php'); ?>

  </div>
</div>

<br>
<h1><center>JORDAN 4 COLLECTION</center></h1><br>
<p id="sale"> STUDENTS SALE 10% OFF </p><br>
<br><br><br><br><br><br><br>
<br>
<div id="gat">
  <h2>Jordan 4 Retro Thunder</h2><br>
  <p id="price"> $150.00 </p><br>
  <input type="button" id="button" class="btn buttonCart" data-productId="11"
         value="Add to cart">
</div>
<br>


</div>

<script src="javascript/HomeAjax.js" > </script>

</body>
</html>