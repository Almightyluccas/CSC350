<?php

namespace model;

class dataBaseCreation {
  private $servername, $username, $password, $dbname ;

  function __construct() {
    $this->servername = 'localhost' ;
    $this->username = 'root' ;
    $this->password = '' ;
  }

  function createDatabase() {
    $conn = mysqli_connect($this->servername, $this->username, $this->password);
    if ($conn) {
      $databaseName = 'csc350';
      $checkDatabaseQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'";
      $checkResult = mysqli_query($conn, $checkDatabaseQuery);

      if (mysqli_num_rows($checkResult) == 0) {
        $createDatabaseQuery = "CREATE DATABASE $databaseName";
        if (mysqli_query($conn, $createDatabaseQuery)) {
          mysqli_close($conn);
          ob_start();
          header("Location: index.php?choice=login");
          ob_end_flush();
          exit();
        } else {
          echo 'Error creating database: ' . mysqli_error($conn);
        }
      } else {
        return 1 ;
      }
    } else {
      return 0 ;
    }
  }


}
