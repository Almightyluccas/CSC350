<?php

namespace view;

use mysql_xdevapi\Exception;

class itemGeneration {
  function cardTemplate($productName, $productPrice, $productImage, $productDescription, $productId) {
    return '
    <div class="col">
      <div class="card">
        <img class="card-img-top" src="' . $productImage . '" alt="">
        <div class="card-body">
          <span class="card-title h5 productName">' . $productName . '</span>
          <p class="card-text h5">' . $productPrice . '</p>
          <p class="card-text">' . $productDescription . '</p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary decreaseQuantity" type="button">-</button>
            </div>
            <input type="text" class="orm-control-sm quantitySelector" value="1" aria-label="Quantity">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary increaseQuantity" type="button">+</button>
            </div>
          </div>
          <input type="button" class="btn btn-primary addToCartBtn" data-productId="' . $productId . '"
            value="Add to cart">
        </div>
      </div>
    </div>';
  }
  private function cartTemplate($productName, $price, $imageUrl, $quantity) {
    return '
    <hr class="my-4">
    <div class="row mb-4 d-flex justify-content-between align-items-center">
      <div class="col-md-2 col-lg-2 col-xl-2">
        <img src="' . $imageUrl . '" class="img-fluid rounded-3" alt="' . $productName . '">
      </div>
      <div class="col-md-3 col-lg-3 col-xl-3">
        <h6 class="text-muted">' . $productName . '</h6>
      </div>
      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">
          <i class="fas fa-minus"></i>
        </button>
        <input id="form1" min="0" name="quantity" value="' . $quantity . '" type="number" 
        class="form-control form-control-sm" />
        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">
          <i class="fas fa-plus"></i>
        </button>
      </div>
      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
        <h6 class="mb-0">$' . $price . '</h6>
      </div>
      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
      </div>
    </div>';
  }
  private function addCardRow($rowLength, $iterator, $columnsPerRow) {
    if ($iterator === 0 ) {
      return '<div class="row mb-4 my-4">' ;
    }
    if ($iterator % $columnsPerRow === 0) {
      return '</div><div class="row mb-4 my-4">' ;
    }else if ($iterator  === $rowLength) {
      return '</div>' ;
    }else {
      return '' ;
    }
  }
  private function addBlankCard($rowLength, $iterator, $columnsPerRow) {
    $missingSpaces = $columnsPerRow - ($rowLength % $columnsPerRow);
    if ($missingSpaces > 0 && $iterator === $rowLength - 1 && $missingSpaces < $columnsPerRow) {
      $output = str_repeat('<div class="col"></div>', $missingSpaces);
      return $output;
    } else {
      return '';
    }
  }

  public function displayProducts($products, $productsPerRow = 3) {
    $output = '';
    $iterator = 0;
    foreach ($products as $product) {
      $productId = $product['productId'];
      $productName = $product['productName'];
      $productPrice = $product['price'];
      $productImage = $product['imageUrl'];
      $productDescription = $product['description'];
      $output .= $this->addCardRow(count($products), $iterator, $productsPerRow)
        . $this->cardTemplate($productName, $productPrice, $productImage, $productDescription, $productId)
        . $this->addBlankCard(count($products), $iterator, $productsPerRow) ;
      $iterator++;
    }
    echo $output;
  }
  public function displayCart($cart) {
    $output = '';
    $iterator = 0;
    foreach ($cart as $carts) {
      $customerId = $carts['customerId'];
      $productId = $carts['productId'];
      $quantity = $carts['quantity'];
      $price = $carts['price'];
      $imageUrl = $carts['imageUrl'];
      $productName = $carts['productName'];

      $output .= $this->cartTemplate($productName,$price,$imageUrl,$quantity);
    }
    echo $output;
  }


}
