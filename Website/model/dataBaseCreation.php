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
        $script = file_get_contents('sql/dbCreationScript.sql');
        if (mysqli_multi_query($conn, $script)) {
          while (mysqli_next_result($conn)) {
          }
          mysqli_close($conn);
          ob_start();
          header("Location: index.php?choice=login");
          ob_end_flush();
          exit();
        } else {

          echo 'Error executing script: ' . mysqli_error($conn);
        }
      }
    }
  }



}
