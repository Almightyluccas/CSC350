<?php
include_once('checker.php');
?>


<!doctype html>
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
  <style>
    #title {
      color: white;
      font-size: 30px;
    }

    .button {
      background: black;
      font-size: 15px;
    }

  </style>

</head>
<body >

<div id="nav" style="background:black ;color:white;">
  <div class="col-sm nav-align"><h1 id="title">Elite Sneakers</h1></div>
  <div class="col-sm nav-align">

    <?php include('menu.php'); ?>

  </div>
</div>
<div class="container ">

  <?php
  include 'view/itemGeneration.php' ;

  $itemGen = new \View\itemGeneration() ;
  if (isset($products)){
    $itemGen->displayProducts($products, 3);
  } else {
    error_log('there was an error generating the products at Products.php $products variable ') ;
  }
  ?>


</div>
<script src="javascript/productAjax.js" > </script>

</body>
</html>