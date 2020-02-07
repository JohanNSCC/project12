<?php
     //Check if user is logged in
     require('../tools/loginChecker.php');

    //Connect to db
    require('../tools/dbConnection.php');
    // sql to delete a record
    $sql = "DELETE FROM $table_name WHERE id=".$_POST['contactID'];

    if (mysqli_query($connection, $sql)) {
        header("Location: ../pages/home.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
    $connection->close();
