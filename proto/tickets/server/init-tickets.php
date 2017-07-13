<?php
  require 'conn.php';

  try {
    // sql to create a table
    $drop="DROP TABLE IF EXISTS `conversation`, `tickets`;";

    $sql = "CREATE TABLE Tickets (
      TicketID int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
      Issue VARCHAR(30) NOT NULL,
      Subject VARCHAR (50) NOT NULL,
      Email VARCHAR(50),
      Description TEXT NOT NULL,
      Progress VARCHAR (10),
      StartDate TIMESTAMP NOT NULL,
      CompDate TIMESTAMP,
      PRIMARY KEY (TicketID)
    )";

    $sql2 = "CREATE TABLE Conversation (
      ConversationID int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
      TicketID int(6) UNSIGNED NOT NULL,
      Content TEXT NOT NULL,
      ConvDate TIMESTAMP NOT NULL,
      Sender VARCHAR(30),
      PRIMARY KEY (ConversationID),
      CONSTRAINT FK_TicketConversation FOREIGN KEY (TicketID) REFERENCES Tickets(TicketID) ON DELETE RESTRICT ON UPDATE CASCADE
    )";

    // use exec() because no results are returned
    $conn->exec($drop);
    echo "<br />Tables Droped";
    $conn->exec($sql);
    echo "<br />Tickets Table created";
    $conn->exec($sql2);
    echo "<br />Conversation Table created";
  } catch (PDOException $e) {
    echo "<br />SQL 01 >>> " . $sql . "<br />" . $e->getMessage();
    echo "<br />SQL 02 >>> " . $sql2 . "<br />" . $e->getMessage();
  }

  $conn = null;
?>
