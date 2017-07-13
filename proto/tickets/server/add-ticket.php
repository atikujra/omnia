<?php
  require './conn.php';

  $issue = $_POST['issue'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];

  echo "<br /> Issue : " . $issue;
  echo "<br /> Subject : " . $subject;
  echo "<br /> Description : " . $description;

  try{
    // Insert Values from Form into table
    $sql = "INSERT INTO `tickets` (`TicketID`, `Issue`, `Subject`, `Email`, `Description`, `Progress`, `StartDate`, `CompDate`)
    VALUES (NULL, '$issue', '$subject', NULL, '$description', NULL, CURRENT_TIMESTAMP, '0000-00-00 00:00:00')";

    //use exec() because no results are returned
    $conn->exec($sql);
    echo "<br />Ticket has been added";
  }
  catch(PDOException $e){
    echo "<br />" . $sql . "<br />" . $e->getMessage();
  }

  $conn = null;
  echo "<br /> <a href='../index.html'>Go Back</a>";
?>
