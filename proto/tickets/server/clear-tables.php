<?php
  require 'conn.php';

  try {
    // sql to create a table

    $sql = "TRUNCATE `conversation`;
            TRUNCATE `tickets`;";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<br />Tables Cleared";
  } catch (PDOException $e) {
    echo "SQL 01 >>> " . $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
?>
