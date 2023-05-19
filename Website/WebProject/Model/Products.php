<?php

namespace model;
use mysql_xdevapi\Exception;

//TODO: fix empty auto column add if products doesn't fill full space

class Products {
  private $serverName, $dbUsername, $dbPassword, $dbName;
  function __construct() {
    $this->serverName = 'localhost' ;
    $this->dbUsername = 'root';
    $this->dbPassword = 'root';
    $this->dbName = 'csc350';
  }

  private function cardTemplate ($productName, $productPrice, $productImage, $productDescription, $productId) {
    return '
      <div class="col">
      <div class="card">
        <img class="card-img-top" src="' . $productImage . '"
        alt="">
        <div class="card-body">

          <span class="card-title h5 productName">' .$productName. '</span>
          <p class="card-texth h5 ">'.$productPrice.'</p>
          <p class="card-text">'.$productDescription. '</p>
          <input type="button"  class="btn btn-primary addToCartBtn" data-productId="  ' .$productId.' " 
          id="" value="Add to cart">
          
        </div>
      </div>
    </div>' ;
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
  }private function addBlankCard ($rowLength, $iterator, $columnsPerRow) {
    if ($rowLength % $columnsPerRow === 2
      && $iterator === $rowLength - 1) {
      return `<div class="col"></div>` ;
    }else if($rowLength % $columnsPerRow === 1
      && $iterator === $rowLength - 1) {
      return `<div class="col"></div> <div class="col"></div>` ;
    } else {
      return '' ;
    }
  }
  function displayProducts($productsPerRow = 3) {
    try{
      $conn = mysqli_connect($this->serverName, $this->dbUsername, $this->dbPassword, $this->dbName);
      $output = '' ;

      $iterator = 0 ;
      if (!$conn) die("Connection failed: " . mysqli_connect_error());

      $sql = "SELECT * FROM csc350.products";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['productId'] ;
        $productName = $row['productName'] ;
        $productPrice = $row['price'] ;
        $productImage = $row['imageUrl'] ;
        $productDescription = $row['description'] ;
        $output .= $this->addCardRow(mysqli_num_rows($result), $iterator, $productsPerRow)
          . $this->cardTemplate($productName, $productPrice, $productImage, $productDescription, $productId)
          . $this->addBlankCard(mysqli_num_rows($result), $iterator, $productsPerRow) ;
        $iterator++ ;
      }
      mysqli_close($conn);
      echo $output ;
    } catch (Exception $error) {
      error_log('there was an error display the cards'. $error->getMessage()) ;
    }
  }

  function getProducts()
  {
    try {
      $conn = mysqli_connect($this->serverName, $this->dbUsername, $this->dbPassword, $this->dbName);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM csc350.products";
      $result = mysqli_query($conn, $sql);

      $products = [];
      while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
      }

      mysqli_close($conn);

      return $products;
    } catch (\Exception $error) {
      error_log('There was an error fetching products: ' . $error->getMessage());
    }
  }
}