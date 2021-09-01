<?php
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', '');
  define('DBNAME', 'productDB');

  try {
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
  ?>