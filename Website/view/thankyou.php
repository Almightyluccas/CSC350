<?php 
include_once('checker.php'); 
?>

<html><head><title>LOGIN WEB SESSION</title>
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



<div class="container">
  <div class="d-flex flex-column justify-content-center align-items-center" style="height: 50vh">
    <h2>THANK YOU</h2>
    <p>Thank You For Your Order <a href="index.php?choice=products">Continue Shopping</a></p>
  </div>
</div>

</body>
</html>
