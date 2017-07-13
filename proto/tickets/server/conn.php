<?php
    $servername = "localhost";
    $username = "administrator";
    $password = "Password123$";
    $dbname = "omnia-proto";

    try{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // Set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected Succesfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>
