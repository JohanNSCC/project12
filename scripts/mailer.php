<?php
//Check if user is logged in
require('../tools/loginChecker.php');

//Connect to db
require('../tools/dbConnection.php');

//Create prepared statement
$stmt = $connection->prepare(" SELECT email FROM $table_name ");   
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// the message
$msg = $_POST['message'];
$subject = $_POST['subject'];

// format lines in the message
$msg = wordwrap($msg,70);

// send emails by looping through the result set
while($row = $result->fetch_assoc()) {
    mail("$row['email']",$subject, $msg);
  }
