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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
          integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>
  <title>Document</title>

</head>
<body style="background-color: dimgrey">

<div id="nav" style="background:black;color:white;">
  <div class="col-sm nav-align"><h1 id="title">BMCC ELECTRONICS</h1></div>
  <div class="col-sm nav-align">

    <?php include('view/menu.php'); ?>

  </div>
</div>




<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12">
      <div class="card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="card-body p-0">
          <div class="row g-0">
            <div class="col-lg-8">
              <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                  <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  <h6 class="mb-0 text-muted">
                    <?php
                    include 'view/itemGeneration.php' ;
                    use View\itemGeneration;
                    if (isset($cartTotalQuantity)) {
                      echo $cartTotalQuantity ;
                    }
                    ?>
                    items
                  </h6>
                </div>
                <?php
                $cart = new itemGeneration() ;
                if(isset($cartData)) {
                  $cart->displayCart($cartData);
                }else {
                  error_log('there was an error inserting cart data into displayCart() ') ;
                }

                ?>
                <hr class="my-4">
                <div class="pt-5">
                  <!-- TODO: change the link below -->
                  <h6 class="mb-0"><a href="/csc50/index.php?choice=products" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                </div>
              </div>
            </div>
            <div class="col-lg-4 bg-grey">
              <div class="p-5">
                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                <hr class="my-4">
                <div class="d-flex justify-content-between mb-4">
                  <h5 class="text-uppercase">items <?php  if(isset($cartTotalQuantity)) echo $cartTotalQuantity?></h5>
                  <h5>$ <?php if(isset($cartTotalPrice)) echo $cartTotalPrice?></h5>
                </div>
                <h5 class="text-uppercase mb-3">Shipping</h5>
                <div class="mb-4 pb-2">
                  <select class="select">
                    <option value="1">Standard Delivery - Free</option>
                    <option value="2">Three Day Delivery - $5.00</option>
                    <option value="3">Same Day Delivery - $8.00</option>
                  </select>
                </div>
                <h5 class="text-uppercase mb-3">Give code</h5>
                <div class="mb-5">
                  <div class="form-outline">
                    <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Examplea2">Enter your code</label>
                  </div>
                </div>
                <hr class="my-4">
                <div class="d-flex justify-content-between mb-5">
                  <h5 class="text-uppercase">Total price</h5>
                  <h5>$ <?php if(isset($cartTotalPrice)) echo $cartTotalPrice += ($cartTotalPrice * .08) ; ?></h5>
                </div>
                <button type="button" class="btn btn-dark btn-block btn-lg"
                        data-mdb-ripple-color="dark">Register</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>


